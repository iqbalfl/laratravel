<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use App\Transaction;
use App\Confirmation;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;
use Illuminate\Support\Facades\Mail;
use App\Exceptions\CarException;

class MemberOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
       {
        //ambil id user dari session
        $auth = Auth::user()->id;

         if ($request->ajax()) {
           $data = Transaction::with('user','place','car','admin')->where('user_id','like',$auth)->get();
           return Datatables::of($data)
             ->addColumn('action', function($transaction){
               return view('datatable._action_print', [
              'cetak_url' => url('/member/orders/cetak', $transaction->id),
              'conf_url' => url('/member/orders/confirmation', $transaction->id),
             ]);
             })->make(true);
           }

           $html = $htmlBuilder
             ->addColumn(['data' => 'code', 'name'=>'code', 'title'=>'Kode Transaksi'])
             ->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'Nama Pelanggan'])
             ->addColumn(['data' => 'place.name', 'name'=>'place.name', 'title'=>'Tujuan'])
             ->addColumn(['data' => 'car.name', 'name'=>'car.name', 'title'=>'Merk mobil'])
             ->addColumn(['data' => 'total_participants', 'name'=>'total_participants', 'title'=>'Jumlah orang'])
             ->addColumn(['data' => 'start_date', 'name'=>'start_date', 'title'=>'Tanggal Pergi'])
             ->addColumn(['data' => 'end_date', 'name'=>'end_date', 'title'=>'Tanggal Kembali'])
             ->addColumn(['data' => 'total_cost', 'name'=>'total_cost', 'title'=>'Total Harga'])
             ->addColumn(['data' => 'status', 'name'=>'status', 'title'=>'Status'])
             ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

             return view('members.myt')->with(compact('html'));
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('members.order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $this->validate($request, [
        'user_id' => 'required',
        'place_id' => 'required',
        'car_id' => 'required',
        'total_participants' => 'required|numeric|min:4|max:8',
        'start_date' => 'required',
        'end_date' => 'required'
      ]);

      try {
        //ambil id terbesar dari transaksi
        $max = DB::table('transactions')->max('id');
        //generate kode unik
        $code = Transaction::generateCode();

        //cek pesanan dan mobil pada tanggal pesan
        $cek = Transaction::with('car')
                ->whereDate('start_date', $request->get('start_date'))
                ->where('car_id', $request->get('car_id'))
        	      ->first();

        //cek apakah mobil sudah ada yg booking
        if (isset($cek)){
            if ($cek->car_id == $request->get('car_id')) {
              throw new CarException("Maaf mobil yg anda pilih pada tgl tersebut sudah ada yang pesan.Silahkan pilih mobil yang lainnya.");
            }
        }

          //store manual ke databse
          $transaction = new Transaction();
          $transaction->id = $max+1;
          $transaction->code = $code;
          $transaction->user_id = $request->user_id;
          $transaction->place_id = $request->place_id;
          $transaction->car_id = $request->car_id;
          $transaction->total_participants = $request->total_participants;
          $transaction->start_date = $request->start_date;
          $transaction->end_date = $request->end_date;
          $transaction->save();

          Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Transaksi Berhasil"
          ]);

      } catch (CarException $e) {
        Session::flash("flash_notification", [
          "level" => "warning",
          "message" => $e->getMessage()
        ]);
        return redirect()->back();
      }

      return redirect()->route('orders.show',$max+1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::with('user','place','car')->find($id);

        $cost = $transaction->place->cost + $transaction->car->cost;

        return view('members.order_info')->with(compact('transaction','cost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //ambil data total harga dari form request
        $total_cost = $request->total_cost;

        //save total harga
        $transaction = Transaction::with('user','place','car')->find($id); #select with - untuk data email
        $transaction->total_cost = $total_cost;
        $transaction->save();

        //kirim email konfirmasi order
        Mail::send('members.email_verification', compact('transaction'), function ($message) use ($transaction) {
          $message->to($transaction->user->email, $transaction->user->name)
                  ->subject('Konfirmasi Order');
        });

        //save id transaksi ke tabel confirmation
        $confirmation = new Confirmation();
        $confirmation->transaction_id = $id;
        $confirmation->save();

        //link untuk konfirmasi
        $conf_url = url('/member/orders/confirmation', $transaction->id);

        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Transaksi Berhasil, Segera lakukan konfirmasi pembayaran.
                    <a href='$conf_url'>Klik disini</a>."
        ]);

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //view konfirmasi
    public function conf($id)
    {
        $transaction = Transaction::with('user','place','car')->find($id);
        $confirmation = DB::table('confirmations')
        ->where('transaction_id','=', $id)->get();
        return view('members.confirmation')->with(compact('transaction','confirmation'));
    }

    //store untuk konfirmasi
    public function storeconf(Request $request, $id)
    {
      $this->validate($request, [
      'transaction_id' => 'required',
      'payment_method' => 'required',
      'info' => 'required',
      'paid_total' => 'required|numeric',
      'image' => 'image|max:2048',
      ]);

      $confirmation = Confirmation::find($id);
      $confirmation->update($request->all());

      if ($request->hasFile('image')) {
        // menambil image yang diupload berikut ekstensinya
        $filename = null;
        $uploaded_image = $request->file('image');
        $extension = $uploaded_image->getClientOriginalExtension();
        // membuat nama file random dengan extension
        $filename = md5(time()) . '.' . $extension;
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        // memindahkan file ke folder public/img
        $uploaded_image->move($destinationPath, $filename);
        // hapus image lama, jika ada
        if ($confirmation->image) {
          $old_image = $confirmation->image;
          $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
          . DIRECTORY_SEPARATOR . $confirmation->image;
          try {
            File::delete($filepath);
          } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
          }
        }
        // ganti field image dengan image yang baru
        $confirmation->image = $filename;
        $confirmation->save();
      }

      Session::flash("flash_notification", [
          "level"=>"success",
          "message"=>"Konfirmasi pembayaran berhasil"
      ]);

      return redirect()->route('orders.index');
    }

    //view dari search-dest/budget
    public function orderdest($id)
    {
        $dest = $id;
        return view('members.orders.order-dest')->with(compact('dest'));
    }

    //view dari search-car
    public function ordercar($id)
    {
        $car = $id;
        return view('members.orders.order-car')->with(compact('car'));
    }

    //cetak invoice
    public function cetak($id)
    {
        $transaction = Transaction::with('user','place','car')->find($id);
        $confirmation = DB::table('confirmations')
        ->where('transaction_id','=', $id)->get();
        return view('members.cetak')->with(compact('transaction','confirmation'));
    }
}

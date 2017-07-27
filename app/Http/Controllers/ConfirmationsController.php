<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Confirmation;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;

class ConfirmationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
       {
         if ($request->ajax()) {
           $confirmations = Confirmation::with('transaction')->get();
           return Datatables::of($confirmations)
             ->addColumn('action', function($confirmation){
               return view('datatable._action', [
                 'model' => $confirmation,
                 'form_url' => route('confirmations.destroy', $confirmation->id),
                 'edit_url' => route('confirmations.edit', $confirmation->id),
                 'confirm_message' => 'Yakin mau menghapus confirmation id->' . $confirmation->id . '?'
               ]);
             })->make(true);
           }

           $html = $htmlBuilder
             ->addColumn(['data' => 'transaction.code', 'name'=>'transaction.code', 'title'=>'Kode Transaksi'])
             ->addColumn(['data' => 'payment_method', 'name'=>'payment_method', 'title'=>'Jenis Pembayaran'])
             ->addColumn(['data' => 'info', 'name'=>'info', 'title'=>'Keterangan'])
             ->addColumn(['data' => 'paid_total', 'name'=>'paid_total', 'title'=>'Total Dibayar'])
             ->addColumn(['data' => 'status', 'name'=>'status', 'title'=>'Status'])
             ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

             return view('confirmations.index')->with(compact('html'));
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $confirmation = Confirmation::find($id);
      return view('confirmations.edit')->with(compact('confirmation'));
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
      $this->validate($request, [
        'transaction_id' => 'required',
        'payment_method' => 'required',
        'info' => 'required',
        'paid_total' => 'required|numeric',
        'status' => 'required'
      ]);

      $confirmation = Confirmation::find($id);
      $confirmation->update($request->all());

      Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil Diubah"
      ]);

    return redirect()->route('confirmations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Confirmation::destroy($id);

      Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
      ]);

      return redirect()->route('confirmations.index');
    }
}

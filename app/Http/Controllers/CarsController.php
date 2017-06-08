<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Car;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
       {
         if ($request->ajax()) {
           $cars = Car::with('car_type');
           return Datatables::of($cars)
             ->addColumn('action', function($car){
               return view('datatable._action', [
                 'model' => $car,
                 'form_url' => route('cars.destroy', $car->id),
                 'edit_url' => route('cars.edit', $car->id),
                 'confirm_message' => 'Yakin mau menghapus ' . $car->name . '?'
               ]);
             })->make(true);
           }

           $html = $htmlBuilder
             ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Merk Mobil'])
             ->addColumn(['data' => 'car_type.name', 'name'=>'car_type.name', 'title'=>'Tipe Mobil'])
             ->addColumn(['data' => 'sheet', 'name'=>'sheet', 'title'=>'Jumlah Kursi'])
             ->addColumn(['data' => 'cost', 'name'=>'cost', 'title'=>'Harga'])
             ->addColumn(['data' => 'status', 'name'=>'status', 'title'=>'Status'])
             ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

             return view('cars.index')->with(compact('html'));
       }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'car_type_id' => 'required',
          'sheet' => 'required',
          'cost' => 'required',
          'status' => 'required'
        ]);
        $car = Car::create($request->all());

        Session::flash("flash_notification", [
          "level"=>"success",
          "message"=>"Berhasil menyimpan $car->name"
        ]);

        return redirect()->route('cars.index');
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
      $car = Car::find($id);
      return view('cars.edit')->with(compact('car'));
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
        'name' => 'required',
        'car_type_id' => 'required',
        'sheet' => 'required',
        'cost' => 'required',
        'status' => 'required'
      ]);

      $car = Car::find($id);
      $car->update($request->all());

      Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengubah $car->name"
      ]);

    return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::destroy($id);

        Session::flash("flash_notification", [
          "level"=>"success",
          "message"=>"Data Berhasil dihapus"
        ]);

        return redirect()->route('cars.index');
    }
}

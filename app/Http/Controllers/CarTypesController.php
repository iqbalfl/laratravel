<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Car_type;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;

class CarTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
       {
         if ($request->ajax()) {
             $cartypes = Car_type::query();
             return Datatables::of($cartypes)
             ->addColumn('action', function($cartype){
               return view('datatable._action', [
                 'model' => $cartype,
                 'form_url' => route('cartypes.destroy', $cartype->id),
                 'edit_url' => route('cartypes.edit', $cartype->id),
                 'confirm_message' => 'Yakin mau menghapus ' . $cartype->name . '?'
               ]);
             })->make(true);
         }

         $html = $htmlBuilder
        ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'Id'])
        ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Type'])
        ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'])
        ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

         return view('cartypes.index')->with(compact('html'));
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cartypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, ['name' => 'required|unique:car_types']);
      $cartype = Car_type::create($request->all());

      Session::flash("flash_notification", [
      "level"=>"success",
      "message"=>"Berhasil menyimpan $cartype->name"
      ]);
      return redirect()->route('cartypes.index');
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
      $cartype = Car_type::find($id);
      return view('cartypes.edit')->with(compact('cartype'));
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
      $this->validate($request, ['name' => 'required|unique:car_types,name,'. $id]);

      $cartype = Car_type::find($id);
      $cartype->update($request->all());
      Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengubah $cartype->name"
      ]);
      return redirect()->route('cartypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Car_type::destroy($id);
      Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Tipe Mobil Berhasil dihapus"
      ]);
      return redirect()->route('cartypes.index');
    }
}

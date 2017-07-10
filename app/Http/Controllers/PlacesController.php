<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use DB;
use App\Place;
use App\Province;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
       {
         if ($request->ajax()) {
           $data = Place::with('category','province','regency','district','village');
           return Datatables::of($data)
             ->addColumn('action', function($place){
               return view('datatable._action', [
                 'model' => $place,
                 'form_url' => route('places.destroy', $place->id),
                 'edit_url' => route('places.edit', $place->id),
                 'confirm_message' => 'Yakin mau menghapus ' . $place->name . '?'
               ]);
             })->make(true);
           }

           $html = $htmlBuilder
             ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama'])
             ->addColumn(['data' => 'description', 'name'=>'description', 'title'=>'Deskripsi'])
             ->addColumn(['data' => 'category.name', 'name'=>'category.name', 'title'=>'Kategori'])
             ->addColumn(['data' => 'province.name', 'name'=>'province.name', 'title'=>'Propinsi'])
             ->addColumn(['data' => 'regency.name', 'name'=>'regency.name', 'title'=>'Kabupaten/Kota'])
             ->addColumn(['data' => 'district.name', 'name'=>'district.name', 'title'=>'Kecamatan'])
             ->addColumn(['data' => 'cost', 'name'=>'cost', 'title'=>'Harga'])
             ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

             return view('places.index')->with(compact('html'));
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propinsi = Province::all(['id', 'name']);
        return view('places.create')->with('propinsi',$propinsi);
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
        'description' => 'required',
        'category_id' => 'required',
        'province_id' => 'required',
        'regency_id' => 'required',
        'district_id' => 'required',
        'village_id' => 'required',
        'cost' => 'required',
        'admin_id' => 'required'
      ]);
      $place = Place::create($request->all());

      Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $place->name"
      ]);

      return redirect()->route('places.index');
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
        $propinsi = Province::all(['id', 'name']);
        $place = Place::find($id);
        return view('places.edit')->with(compact('place','propinsi'));
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
        'description' => 'required',
        'category_id' => 'required',
        'province_id' => 'required',
        'regency_id' => 'required',
        'district_id' => 'required',
        'village_id' => 'required',
        'cost' => 'required',
        'admin_id' => 'required'
      ]);

        $place = Place::find($id);
        $place->update($request->all());

      Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengubah $place->name"
      ]);

       return redirect()->route('places.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Place::destroy($id);

        Session::flash("flash_notification", [
          "level"=>"success",
          "message"=>"Data Berhasil dihapus"
        ]);

        return redirect()->route('places.index');
    }

    public function kabupaten($id)
	    {
	        $cities = DB::table("regencies")
	                    ->where("province_id",$id)
	                    ->pluck("name","id");
	        return json_encode($cities);
	    }

    public function kecamatan($id)
	     {
	         $cities = DB::table("districts")
	                     ->where("regency_id",$id)
	                     ->pluck("name","id");
	         return json_encode($cities);
	     }
     public function kelurahan($id)
	      {
	          $cities = DB::table("villages")
	                      ->where("district_id",$id)
	                      ->pluck("name","id");
	          return json_encode($cities);
	      }
}

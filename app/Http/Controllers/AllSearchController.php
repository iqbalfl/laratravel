<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Place;

class AllSearchController extends Controller
{
    public function destination(Request $request)
    {
    	if($request->has('destination')){
    		$places = Place::search($request->destination)
    			->paginate(6);
    	}else{
    		$places = Place::paginate(6);
    	}
    	return view('front.destination',compact('places'));
    }

    public function budget(Request $request)
    {
    	if($request->has('budget')){
    		$places = Place::search($request->budget)
    			->paginate(6);
    	}else{
    		$places = Place::paginate(6);
    	}
    	return view('front.budget',compact('places'));
    }

    public function car(Request $request)
    {
    	if($request->has('car')){
    		$cars = Car::search($request->car)
    			->paginate(6);
    	}else{
    		$cars = Car::paginate(6);
    	}
    	return view('front.car',compact('cars'));
    }
}

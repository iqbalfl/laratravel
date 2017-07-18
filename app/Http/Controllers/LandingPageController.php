<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use Session;

class LandingPageController extends Controller
{
    public function welcome(){
      $place = Place::paginate(4);

      return view('welcome',compact('place'));
    }

    public function placeview($id){
      $place = Place::with('category','province','regency','district','village')->find($id);

      return view('front.placeView',compact('place'));
    }
}

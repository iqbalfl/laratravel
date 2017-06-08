<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;


class SettingsController extends Controller
{
    //verifikasi user auth
    public function __construct()
    {
      $this->middleware('auth');
    }

    //menampilkan profil
    public function profile()
    {
        $auth = Auth::user()->id;
        $user = User::find($auth);
        return view('users.index')->with(compact('user'));
    }

    //update data profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
          'name' => 'required',
          'username' => 'required',
          'email' => 'required|unique:users,email,' . $user->id,
          'mobile_phone' => 'required|numeric'
        ]);

        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->mobile_phone = $request->get('mobile_phone');
        $user->save();

        Session::flash("flash_notification", [
          "level"=>"success",
          "message"=>"Profil Berhasil Diubah"
        ]);

         return view('users.index')->with(compact('user'));
    }

    //edit password
    public function editPassword()
    {
      return view('users.password');
    }

    //simpan hasil edit password
    public function updatePassword(Request $request)
    {
      $user = Auth::user();
      $this->validate($request, [
        'password' => 'required|passcheck:' . $user->password,
        'new_password' => 'required|confirmed|min:6',
      ], [
        'password.passcheck' => 'Password lama tidak sesuai'
      ]);

      $user->password = bcrypt($request->get('new_password'));
      $user->save();

      Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Password berhasil diubah"
      ]);
      return redirect('admin/settings/password');
    }


}

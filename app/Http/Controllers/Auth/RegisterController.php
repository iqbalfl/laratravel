<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('user-should-verified');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:55|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile_phone' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
          'name' => $data['name'],
          'username' => $data['username'],
          'email' => $data['email'],
          'mobile_phone' => $data['mobile_phone'],
          'password' => bcrypt($data['password']),
        ]);
        $memberRole = Role::where('name', 'member')->first();
        $user->attachRole($memberRole);
        $user->sendVerification();
        return $user;
    }

    public function verify(Request $request, $token)
    {
      $email = $request->get('email');
      $user = User::where('verification_token', $token)->where('email', $email)->first();
      if ($user) {
        $user->verify();
        Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Berhasil melakukan verifikasi."
        ]);
        Auth::login($user);
      }
      return redirect('/home');
    }

    public function sendVerification(Request $request)
    {
      $user = User::where('email', $request->get('email'))->first();
      if ($user && !$user->is_verified) {
        $user->sendVerification();
        Session::flash("flash_notification", [
          "level"=>"success",
          "message"=>"Silahkan klik pada link aktivasi yang telah kami kirim."
        ]);
      }
      return redirect('/login');
    }
}

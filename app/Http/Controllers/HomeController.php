<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laratrust\LaratrustFacade as Laratrust;

class HomeController extends Controller
{
  /*
   * Cek auth member / admin
   */
  public function index()
  {
    if (Laratrust::hasRole('admin')) return $this->adminDashboard();
    if (Laratrust::hasRole('member')) return $this->memberDashboard();
    return view('auth/login');
  }
  /*
   * jika admin redirect ke admin dashboard
   */
  protected function adminDashboard()
  {
    return view('dashboard.admin');
  }
  /*
   * jika member redirect ke member dashboard
   */
  protected function memberDashboard()
  {
    return view('dashboard.member');
  }
}

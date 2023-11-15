<?php

namespace App\Http\Controllers\authentications;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginBasic extends Controller
{
  public function index()
  {
    if (Auth::check()) {
      return redirect('/');
    }

    $pageConfigs = ['myLayout' => 'blank'];

    return view('content.authentications.auth-login-basic', ['pageConfigs' => $pageConfigs]);
  }
}

<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EcommerceProductAdd extends Controller
{
  public function index()
  {
    return view('content.apps.app-ecommerce-product-add');
  }

  public function create(Request $request)
  {
    dd($request);
  }
}

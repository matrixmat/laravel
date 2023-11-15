<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|string|max:255',
        'sku' => 'required|string|max:50',
        'barcode' => 'required|string|max:20',
        'base_price' => 'required|numeric|min:0|max:999999.99',
        'discounted_price' => 'required|numeric|min:0|max:999999.99',
    ]);


        // Perform the product creation
        $product = Product::create($request->all());

        if ($product) {
            return redirect('/')->with('success', 'Product created successfully !');
        } else {
            return back()->withInput()->withErrors(['error' => 'Product creation failed']);
        }
    }

}

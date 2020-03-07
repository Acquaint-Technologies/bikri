<?php

namespace App\Http\Controllers\BackEndCon;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function adminProductList()
    {
        $products = Product::with(['user'])->get();
        return view('admin.product list.view-product', compact('products'));
    }
}

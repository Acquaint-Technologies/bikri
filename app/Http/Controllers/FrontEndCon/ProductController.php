<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = DB::table('categories')
            ->where('categories.btype_id', Auth::user()->business_type)
            ->get();
        return view('public.product.add-product', compact('categories'));
    }

    public function saveProduct(Request $request)
    {
        $data = array(
            'user_id' => Auth::id(),
            'category_id' => $request->product_type,
            'product_name' => $request->product_name,
            'product_cost' => $request->product_cost,
            'sale_price' => $request->sale_price,
        );
        $product = Product::create($data);
        if ($product) {
            return redirect('/add-product')->with('message', 'Product added successfully');
        } else {
            return redirect('/');
        }
    }

    public function viewProduct()
    {
        $products = Product::where('user_id', Auth::id())->get();
        return view('public.product.view-product', compact('products'));
    }

    public function updateProduct(Request $request)
    {
        $data = array(
            'product_name' => $request->product_name,
            'product_cost' => $request->product_cost,
            'sale_price' => $request->sale_price,
        );
        $updated = Product::find($request->id)->update($data);
        if ($updated) {
            Session::flash('message', 'Product updated Successfully');
        } else {
            Session::flash('message', 'Whoops! Failed to add product');
        }
        return redirect('/view-product');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $destroy = $product->delete();
        if ($destroy) {
            Session::flash('message', 'Product deleted Successfully');
        } else {
            Session::flash('message', 'Whoops! Product not deleted');
        }
        return redirect('/view-product');
    }
}

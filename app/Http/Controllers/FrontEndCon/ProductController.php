<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

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
        $products = DB::table('products')
            ->where('owner_id', Auth::id())
            ->get();

        return view('public.product.view-product', compact('products'));
    }

    public function updateProduct(Request $request)
    {
        $product = Product::find($request->id);
        $product->product_name = $request->product_name;
//        $product->product_type = $request->product_type;
        $product->sale_price = $request->sale_price;
        $product->product_cost = $request->product_cost;
        $product->save();


        return redirect('/view-product')->with('message', 'Product updated successfully');
//        $categoryImage = $request->file('cat_image');

//        if ($categoryImage)
//        {
//            unlink($product category->cat_image);
//            $imageName = $categoryImage->getClientOriginalName();
//            $directory ='public/admin/product category-images/';
//            $imageUrl = $directory.$imageName;
//            $categoryImage->move($directory, $imageName);
//
//
//
//            $product category->cat_name = $request->cat_name;
//            $product category->cat_desc = $request->cat_desc;
//            $product category->cat_image = $imageUrl;
//            $product category->save();
//        }
//        else
//        {
//            $product category->cat_name = $request->cat_name;
//            $product category->cat_desc = $request->cat_desc;
//            $product category->save();
//        }

//        return redirect('/product category/manage')->with('message','Category updated successfully');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/view-product')->with('message', 'Product deleted successfully');

    }
}

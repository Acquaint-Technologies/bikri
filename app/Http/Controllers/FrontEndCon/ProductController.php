<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Session;
use DB;

class ProductController extends Controller
{
    public function addProduct()
    {


        $value = Session::get('OwnerBusinessType');

        $categories = DB::table('categories')
          //  ->join('btypes','categories.cat_btype_id' ,'=', 'btypes.id')
           // ->join('owners','categories.cat_btype_id' ,'=', 'owners.business_type')
            ->where('categories.cat_btype_id',$value)
            ->get();
       // dd($categories);

//        $categories=Category::where(session('btypeId'))->get();
        return view('public.product.add-product',['categories'=>$categories]);
    }

    public function saveProduct(Request $request)
    {
//           Product::create($request->all());

        $product = new Product();
//        $product->product_type = Session::get('catName');
        $product->product_name = $request->product_name;
        $product->sale_price = $request->sale_price;
        $product->product_cost = $request->product_cost;
        $product->owner_id = Session::get('ownerId');
        if ($request->session()->has('ownerId')) {
            $product->cat_id = $request->product_type;
            $product->save();
            return redirect('/add-product')->with('message','product added successfully') ;
        }
        else
        {
            return redirect('/');
        }


        Session::put('productName',$product->product_name);
        Session::put('productId',$product->id);
        Session::put('salePrice',$product->sale_price);


    }

    public function viewProduct()
    {
//        $products=Product::all();
        $val = Session::get('ownerId');
        $products = DB::table('products')
            ->where('owner_id',$val)
            ->get();

        return view('public.product.view-product',['products'=>$products]);
    }

    public function updateProduct(Request $request)
    {
        $product= Product::find($request->id);
        $product->product_name = $request->product_name;
//        $product->product_type = $request->product_type;
        $product->sale_price = $request->sale_price;
        $product->product_cost = $request->product_cost;
        $product->save();


        return redirect('/view-product')->with('message','Product updated successfully');
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
        $product= Product::find($id);
        $product->delete();

        return redirect('/view-product')->with('message','Product deleted successfully');

    }
}

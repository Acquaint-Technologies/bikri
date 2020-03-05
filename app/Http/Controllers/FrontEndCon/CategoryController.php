<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public function addProductCategory()
    {
//        $products=Category::all();
        return view('admin.product category.add-category');
    }

    public function saveProductCategory(Request $request)
    {
//           Product::create($request->all());

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->cat_btype_id = Session::get('btypeId');
        $category->business_type = Session::get('btypeName');
        $category->save();

        Session::put('catName',$category->category_name);
        Session::put('catId',$category->id);

        return redirect('/admin/add-product-category')->with('message','product category added successfully') ;
    }

    public function viewProductCategory()
    {
        $categories=Category::all();
        return view('admin.product category.view-category',['categories'=>$categories]);
    }

    public function publishedProductCategory($id)
    {
        $category=Category::find($id);
        $category->status=0;
        $category->save();

        return redirect('/admin/view-product-category');
    }

    public function unpublishedProductCategory($id)
    {
        $category=Category::find($id);
        $category->status=1;
        $category->save();

        return redirect('/admin/view-product-category');
    }

    public function updateProductCategory(Request $request)
    {
        $category= Category::find($request->id);
        $category->cat_btype_id = $request->cat_btype_id;
        $category->business_type = $request->business_type;
        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->save();


        return redirect('/admin/view-product-category')->with('message','Product category updated successfully');
    }

    public function deleteProductCategory($id)
    {
        $category= Category::find($id);
        $category->delete();

        return redirect('/admin/view-product-category')->with('message','Product category deleted successfully');

    }
}

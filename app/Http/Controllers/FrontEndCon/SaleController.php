<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Http\Controllers\Controller;
use App\Product;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class SaleController extends Controller
{
    public function addSale()
    {
        $products = Product::where('products.user_id', Auth::id())
            ->get();
        return view('user.sale.add-sale', ['products' => $products]);
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = DB::table('products')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get('sale_price');

        $v = $request->get('quantity');

        $mul = $data * $v;
        return $mul;
    }

    public function saveSale(Request $request)
    {
        $sale = new Sale();
//        $sale->product_name = $request->product_name;
        $sale->sales_product_id = $request->product_name;
        $sale->user_id = Auth::id();

        if ($request->session()->has('ownerId')) {

            $sale->quantity = $request->quantity;
            $cost = $request->sales_total;
            $sale->sales_total = $request->quantity * $cost;
//        $qty = $request->quantity;
//        $cost = $request->product_cost;
//        $total = $qty*$cost;
//        $sale->$total;
            $sale->save();
            return redirect('/add-sale')->with('message', 'sale added successfully');
        } else {
            return redirect('/');
        }
    }

    public function viewSale()
    {
        $sales = Sale::with('product')
            ->where('user_id', Auth::id())
            ->get();
        return view('user.sale.view-sale', compact('sales'));
    }

    public function updateSale(Request $request)
    {
        $sale = Sale::find($request->id);
        $sale->product_name = $request->product_name;
        $sale->quantity = $request->quantity;
        $sale->product_cost = $request->quantity * $sale->product_cost;
        $updated = $sale->save();
        if ($updated) {
            Session::flash('message', 'Sale updated Successfully');
        } else {
            Session::flash('message', 'Whoops! Sale not updated');
        }
        return redirect('/view-sale');
    }

    public function deleteSale($id)
    {
        $sale = Sale::find($id);
        $destroy = $sale->delete();
        if ($destroy) {
            Session::flash('message', 'Sale deleted Successfully');
        } else {
            Session::flash('message', 'Whoops! Sale not deleted');
        }
        return redirect('/view-sale');
    }
}

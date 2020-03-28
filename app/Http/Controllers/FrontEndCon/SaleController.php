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
        $data = array(
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'product_cost' => $request->sales_total,
        );
        $sale = Sale::create($data);
        if ($sale) {
            Session::flash('message', 'sale added successfully');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', "Whoops! Failed to add Sale");
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->route('add-sale');
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

<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;
use Session;
use DB;

class SaleController extends Controller
{
    public function addSale()
    {
        $value = Session::get('ownerId');


        $products = DB::table('products')
            //  ->join('btypes','categories.cat_btype_id' ,'=', 'btypes.id')
            // ->join('owners','categories.cat_btype_id' ,'=', 'owners.business_type')
            ->where('products.owner_id',$value)
            ->get();
        return view('public.sale.add-sale',['products'=>$products]);
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
//        $output = '<input value="">Select '.ucfirst($dependent).'</input>';
//        foreach($data as $row)
//        {
//            $output .= '<input value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
//        }
//        echo $output;


        $v = $request->get('quantity');

        $mul = $data*$v;
        return $mul;

//        $value = Session::get('ownerId');
//
//
//        $products = DB::table('products')
//            //  ->join('btypes','categories.cat_btype_id' ,'=', 'btypes.id')
//            // ->join('owners','categories.cat_btype_id' ,'=', 'owners.business_type')
//            ->where('products.owner_id',$value)
//            ->get();
//        return view('public.sale.add-sale',['products'=>$products]);


    }



    public function saveSale(Request $request)
    {
        $sale = new Sale();
//        $sale->product_name = $request->product_name;
        $sale->sales_product_id = $request->product_name;
        $sale->owner_id = Session::get('ownerId');

        if ($request->session()->has('ownerId')) {

            $sale->quantity = $request->quantity;
            $cost = $request->sales_total;
            $sale->sales_total = $request->quantity*$cost;
//        $qty = $request->quantity;
//        $cost = $request->product_cost;
//        $total = $qty*$cost;
//        $sale->$total;
            $sale->save();
            return redirect('/add-sale')->with('message','sale added successfully') ;
        }
        else
        {
            return redirect('/');
        }



    }

    public function viewSale()
    {
        $val = Session::get('ownerId');
        $sales = DB::table('sales')
            ->where('owner_id',$val)
            ->get();
        return view('public.sale.view-sale',['sales'=>$sales]);
    }


    public function updateSale(Request $request)
    {


        $sale= Sale::find($request->id);
        $sale->product_name = $request->product_name;
        $sale->quantity = $request->quantity;
//        $cost = $request->product_cost;
        $sale->product_cost = $request->quantity*$sale->product_cost;
        $sale->save();


        return redirect('/view-sale')->with('message','Sale updated successfully');
//
    }


    public function deleteSale($id)
    {
        $sale= Sale::find($id);
        $sale->delete();

        return redirect('/view-sale')->with('message','Sale deleted successfully');

    }


}

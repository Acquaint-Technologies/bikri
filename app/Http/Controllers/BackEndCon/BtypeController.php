<?php

namespace App\Http\Controllers\BackEndCon;

use App\Btype;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class BtypeController extends Controller
{
    public function addBtype()
    {
        return view('admin.business type.add-btype');
    }

    public function saveBtype(Request $request)
    {
//           Product::create($request->all());

        $btype = new Btype();
        $btype->business_name = $request->business_name;
        $btype->business_desc = $request->business_desc;
//        $btype->status = $request->status;
        $btype->save();

        $btypeId = $btype->id;
        $btypeName =$btype->business_name;
        Session::put('btypeId',$btypeId);
        Session::put('btypeName',$btypeName);

        return redirect('/admin/add-btype')->with('message','Business Type added successfully') ;
    }

    public function viewBtype()
    {
        $btypes=Btype::all();
        return view('admin.business type.view-btype',['btypes'=>$btypes]);
    }


    public function publishedBtype($id)
    {
        $btype=Btype::find($id);
        $btype->status=0;
        $btype->save();

        return redirect('/admin/view-btype');
    }

    public function unpublishedBtype($id)
    {
        $btype=Btype::find($id);
        $btype->status=1;
        $btype->save();

        return redirect('/admin/view-btype');
    }

    public function updateBtype(Request $request)
    {
        $btype= Btype::find($request->id);
        $btype->business_name = $request->business_name;
        $btype->business_desc = $request->business_desc;
        $btype->save();


        return redirect('/admin/view-btype')->with('message','Type updated successfully');
    }

    public function deleteBtype($id)
    {
        $btype= Btype::find($id);
        $btype->delete();

        return redirect('/admin/view-btype')->with('message','Type deleted successfully');

    }
}

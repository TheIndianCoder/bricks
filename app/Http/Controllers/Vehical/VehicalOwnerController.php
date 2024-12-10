<?php

namespace App\Http\Controllers\Vehical;

use App\Http\Controllers\Controller;
use App\Models\Vehical\VehicalOwner;
use Exception;
use Illuminate\Http\Request;

class VehicalOwnerController extends Controller
{
    public function ownerList(Request $request){
        if ($request->hasAny('delete_conifrm') && $request->has('delete_conifrm') != null && $request->has('id') != null) {
            $id = $request->id;
            VehicalOwner::where('id', $id)->delete();

            return redirect()->back()->with('success', 'One record deleted');
        }else{
            $vehicalOwnerList = VehicalOwner::all();
            return view('vehical.owner.list',compact('vehicalOwnerList'));
        }
        
    }
    public function addOwner(Request $request){
        
        try{
            $request->validate([
                'company_name' => 'required',
                'owner_name' => 'required',
                'gst' => 'nullable',
                'registration' => 'nullable',
            ]);

            VehicalOwner::create([
                'company_name' => $request->company_name,
                'owner_name' => $request->owner_name,
                // 'no_of_vehicals' => $request-,
                'gst_number' => $request->gst ?? '',
                'registration_no' => $request->registration ?? '',
            ]);

            return redirect()->back()->with('success','New Owner has been created');
        }catch(Exception $e){
            return redirect()->back()->with('error',"Somthing went wrong");
        }
    }
    public function editOwner(Request $request){
        try{
            $request->validate([
                'company_name' => 'required',
                'owner_name' => 'required',
                'gst' => 'required',
                'id' => 'required',
                'registration' => 'nullable',
            ]);

            VehicalOwner::where('id',$request->id)->update([
                'company_name' => $request->company_name,
                'owner_name' => $request->owner_name,
                'gst_number' => $request->gst,
                'registration_no' => $request->registration,
            ]);

            return redirect()->back()->with('success','Owner has been updated');
        }catch(Exception $e){
            return redirect()->back()->back('error','Somthing Went wrong');
        }
    }
}

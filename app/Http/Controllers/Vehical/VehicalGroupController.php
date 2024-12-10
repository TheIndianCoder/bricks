<?php

namespace App\Http\Controllers\Vehical;

use App\Http\Controllers\Controller;
use App\Models\Vehical\VehicalGroup;
use Exception;
use Illuminate\Http\Request;

class VehicalGroupController extends Controller
{
    public function vehicalGList(Request $request){
        if ($request->hasAny('delete_conifrm') && $request->has('delete_conifrm') != null && $request->has('id') != null) {
            $id = $request->id;
            VehicalGroup::where('id', $id)->delete();

            return redirect()->back()->with('success', 'One record deleted');
        }else{
            $vehicalGroupList = VehicalGroup::all();
            return view('vehical.group.list',compact('vehicalGroupList'));
        }        
    }
    public function addVehicalGroup(Request $request){
        
        try{
            $request->validate([
                'group_name' => 'required',
            ]);

            VehicalGroup::create([
                'group_name' => $request->group_name
            ]);

            return redirect()->back()->with('success','New Group has been created');

        }catch(Exception $e){
            return redirect()->back()->with('error','Somthing went wrong');
        }
    }
    public function editVehiclGroup(Request $request){
        try{
            $request->validate([
                'group_name' => 'required',
                'id' => 'required',
            ]);

            VehicalGroup::where('id',$request->id)->update([                
                'group_name' => $request->group_name
            ]);

            return redirect()->back()->with('success','Group has been updted');

        }catch(Exception $e){
            return redirect()->back()->with('error','Somthing went wrong');
        }
    }
}

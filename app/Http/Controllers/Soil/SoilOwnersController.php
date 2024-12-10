<?php

namespace App\Http\Controllers\Soil;

use App\Http\Controllers\Controller;
use App\Models\RowMet\Soil\SoilOwner;
use Exception;
use Illuminate\Http\Request;

class SoilOwnersController extends Controller
{
    public function soilOwnerList(){
        $soilOwners = SoilOwner::get();
        return view('soil.soil-owner-list',compact('soilOwners'));
    }
    public function addSoilOwner(Request $request){
        // dd($request->all());
        $request->validate([
            'owner_name'  => 'required',
            'ploat_location'=> 'required',
            'owner_mobile'=> 'required',
            'bigha'=> 'required',
            'contract_amt'=> 'required',
            'aggrement_paper'=> 'nullable',
        ]);
        try{

            $year = date('Y');
            // Defining file(s) storage path
            $file_storage_path = storage_path('app/public/soil-owner/'.$year);
            // Checking
            if (!is_dir($file_storage_path)) {
                // Making directory with permission
                mkdir($file_storage_path, 0777, true);
            }
            // checking
            if ($request->hasFile('aggrement_paper')) {
                // Creating new name for the uploaded aadhar(front)
                $aggrementPaper =  $request->owner_name. '_' . time() . '.' . $request->file('aggrement_paper')->getClientOriginalExtension();
                $file = $request->file('aggrement_paper');
            }

            SoilOwner::create([
                'name' => $request->owner_name,
                'address' => $request->ploat_location,
                'contact_no' => $request->owner_mobile,
                'bigha' => $request->bigha,
                'deal_amt' => $request->contract_amt,                
                'aggrement_paper' =>$aggrementPaper,
            ]);

            if ($request->hasFile('aggrement_paper')) {
                // Cropping and moving uploaded aadhar(front)
                $file->move($file_storage_path, $aggrementPaper);                
            }

            return redirect()->back()->with('success', 'New Soil Owner created');

        }catch(Exception $e){
            return redirect()->back()->with('error','Somthing went wrong');
        }
    }
    public function updateSoilOwner(Request $request){
        $request->validate([
            'owner_name'  => 'required',
            'ploat_location'=> 'required',
            'owner_mobile'=> 'required',
            'bigha'=> 'required',
            'contract_amt'=> 'required',
            'aggrement_paper'=> 'nullable',
        ]);
        try{

            $year = date('Y');
            // Defining file(s) storage path
            $file_storage_path = storage_path('app/public/soil-owner/'.$year);
            // Checking
            if (!is_dir($file_storage_path)) {
                // Making directory with permission
                mkdir($file_storage_path, 0777, true);
            }
            // checking
            if ($request->hasFile('aggrement_paper')) {
                // Creating new name for the uploaded aadhar(front)
                $aggrementPaper =  $request->owner_name. '_' . time() . '.' . $request->file('aggrement_paper')->getClientOriginalExtension();
                $file = $request->file('aggrement_paper');
            }

            $updateArr = [
                'name' => $request->owner_name,
                'address' => $request->ploat_location,
                'contact_no' => $request->owner_mobile,
                'bigha' => $request->bigha,
                'deal_amt' => $request->contract_amt,
            ];
            if ($request->hasFile('aggrement_paper') && $request->aggrement_paper != null) {
                $updateArr['aggrement_paper'] = $aggrementPaper;
            }
            
            SoilOwner::where('id',$request->id)->update($updateArr);

            if ($request->hasFile('aggrement_paper')) {
                // Cropping and moving uploaded aadhar(front)
                $file->move($file_storage_path, $aggrementPaper);                
            }

            return redirect()->back()->with('success', 'Soil Owner has been updated');

        }catch(Exception $e){
            return redirect()->back()->with('error','Somthing went wrong');
        }
    }
    public function changeStatus(Request $request){

    }
}

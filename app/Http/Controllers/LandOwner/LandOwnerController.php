<?php

namespace App\Http\Controllers\LandOwner;

use App\Http\Controllers\Controller;
use App\Models\Land\LandOwner;
use Exception;
use Illuminate\Http\Request;
use Image;

class LandOwnerController extends Controller
{
    public function landOwners()
    {
        $landOwner = LandOwner::orderBy('id', 'DESC')->get();

        return view('land-owner.list', compact('landOwner'));
    }
    public function addLandOwner(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'owner_name' => 'required',
            'bigha' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'contract_amt' => 'required',
            'contract_date' => 'required',
            'aggrement_paper' => 'required',
            'other_details' => 'required'
        ]);
        try {
            $year = date('Y');
            // Defining file(s) storage path
            $file_storage_path = storage_path('app/public/land-owner/'.$year);
            // Checking
            if (!is_dir($file_storage_path)) {
                // Making directory with permission
                mkdir($file_storage_path, 0777, true);
            }

            if ($request->hasFile('aggrement_paper')) {
                // Creating new name for the uploaded aadhar(front)
                $aggrementPaper =  $request->owner_name. '_' . time() . '.' . $request->file('aggrement_paper')->getClientOriginalExtension();
                $file = $request->file('aggrement_paper');
            }
            LandOwner::create([
                'land_lord' => $request->owner_name,
                'begha' => $request->bigha,
                'land_lord_address' => $request->owner_address,
                'sqt_fet' => 0,
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'amount' => $request->contract_amt,
                'land_location' => $request->ploat_location,
                'aggrement_date' => $request->contract_date,
                'aggrement_paper' => $aggrementPaper ?? '',
                'other_details' => $request->other_details,
            ]);

            if ($request->hasFile('aggrement_paper')) {
                // Cropping and moving uploaded aadhar(front)
                $file->move($file_storage_path, $aggrementPaper);                
            }

            return redirect()->back()->with('success', 'New Owner created');

        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function editLandOwner(Request $request)
    {
        $request->validate([
            'owner_name' => 'required',
            'bigha' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'contract_amt' => 'required',
            'contract_date' => 'required',
            'aggrement_paper' => 'nullable',
            'other_details' => 'required',
            'id' => 'required',
        ]);

        try {

            $year = date('Y');
            // Defining file(s) storage path
            $file_storage_path = storage_path('app/public/land-owner/'.$year);
            // Checking
            if (!is_dir($file_storage_path)) {
                // Making directory with permission
                mkdir($file_storage_path, 0777, true);
            }

            if ($request->hasFile('aggrement_paper')) {
                // Creating new name for the uploaded aadhar(front)
                $aggrementPaper =  $request->owner_name. '_' . time() . '.' . $request->file('aggrement_paper')->getClientOriginalExtension();
                $file = $request->file('aggrement_paper');
            }

            $updateArr = [
                'land_lord' => $request->owner_name,
                'land_lord_address' => $request->owner_address,
                'begha' => $request->bigha,
                'sqt_fet' => 0,
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'amount' => $request->contract_amt,
                'aggrement_date' => $request->contract_date,
                'land_location' => $request->ploat_location,
                //'aggrement_paper' => $aggrementPaper,  // need to be change
                'other_details' => $request->other_details,
            ];
            if($request->hasFile('aggrement_paper') && $request->aggrement_paper != null){
                $updateArr['aggrement_paper'] = $aggrementPaper;
            }
            // update record
            LandOwner::where('id', $request->id)->update($updateArr);
            // store file
            if ($request->hasFile('aggrement_paper')) {
                // Cropping and moving uploaded aadhar(front)
                $file->move($file_storage_path, $aggrementPaper);                
            }

            return redirect()->back()->with('success', 'Land owner has been updated');

        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
    public function changeStatus(Request $request)
    {
        // dd($request->all());
        try{

            $landOwner = LandOwner::findOr($request->id);
            // echo "<pre>";
            // print_r($landOwner);
            // die;

            $landOwner->states = $landOwner->states == 'Active' ? 'Deactive' : 'Active';
            
            $landOwner->save();
            
            return redirect()->back()->with('success','Data status has been changed');

        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}

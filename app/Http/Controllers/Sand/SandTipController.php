<?php

namespace App\Http\Controllers\Sand;

use App\Http\Controllers\Controller;
use App\Models\RowMet\Sand\SandTips;
use Exception;
use Illuminate\Http\Request;

class SandTipController extends Controller
{
    public function sandTipList(Request $request){
        
        $tipList = SandTips::orderBy('id','DESC')->get();

        return view('sand.sand-tip-list',compact('tipList'));
    }
    public function addSandTip(Request $request){
        // dd($request->all());
        try{
            $request->validate([
                'vehical_no' =>'required',
                'from' =>'required',
                'where' =>'required',
                'date' =>'required',
                'trip_rate' =>'required',
                'no_of_trip' =>'required',
                'net_amt' =>'required',
                'pay_amt' =>'required',
            ]);
            $year = date('Y');
            // Defining file(s) storage path
            $file_storage_path = storage_path('app/public/sand-tip/'.$year);
            // Checking
            if (!is_dir($file_storage_path)) {
                // Making directory with permission
                mkdir($file_storage_path, 0777, true);
            }
            $document = '';
            // checking
            if ($request->hasFile('document')) {
                // Creating new name for the uploaded aadhar(front)
                $document =  $request->document. '_' . time() . '.' . $request->file('document')->getClientOriginalExtension();
                $file = $request->file('document');
            }           

            $dueAmt = $request->net_amt - $request->pay_amt;
            SandTips::create([
                'vehical_number' => $request->vehical_no,
                'from' => $request->from,
                'where' => $request->where,
                'date' => $request->date,
                'rate_of_tip' => $request->trip_rate,
                'no_of_tip' => $request->no_of_trip,
                'net_amt' => $request->net_amt,
                'due_amt'=> $dueAmt,
                'pay_amt' => $request->pay_amt,
                'status' => $dueAmt == 0 ? 'Complete' : 'Pending' ,
                'document' => $document ?? null,
            ]);

            if ($request->hasFile('document')) {
                // Cropping and moving uploaded aadhar(front)
                $file->move($file_storage_path, $document);                
            }

            return redirect()->back()->with('success', 'New Tip has been stored');

        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
    public function updateSandTip(Request $request){

    }
    public function changeStatus(Request $request){

    }
}

<?php

namespace App\Http\Controllers\Sardat;

use App\Http\Controllers\Controller;
use App\Models\Sardar\SardarList;
use Exception;
use Illuminate\Http\Request;

class SardarListController extends Controller
{
    public function sardarList(Request $request)
    {
        if ($request->hasAny('delete_conifrm') && $request->has('delete_conifrm') != null && $request->has('id') != null) {
            $id = $request->id;
            SardarList::where('id', $id)->delete();

            return redirect()->back()->with('success', 'One record deleted');
        } else {
            $sardarList = SardarList::get();
            return view('sardar.list', compact('sardarList'));
        }

    }
    public function addSardar(Request $request)
    {
        $request->validate([
            'consultancy_name' => 'required',
            'contact_person' => 'required',
            'address' => 'required',
            'aadhar' => 'required',
            'mobile1' => 'required',
            'mobile2' => 'required',
        ]);

        try {

            $sardar_id = "SA0001";

            if ((SardarList::count()) != 0) {

                $lastList = SardarList::orderBy('id', 'DESC')->first(['sardar_id']);
                $lastId = $lastList->sardar_id;

                // Extract the numeric part using regex (if the number is always after 'SA')
                preg_match('/(\d+)$/', $lastId, $matches);

                // Increment the number by 1
                $new_number = str_pad($matches[0] + 1, strlen($matches[0]), '0', STR_PAD_LEFT);

                // Combine the prefix 'SA' with the incremented number
                $sardar_id = "SA" . $new_number;
            }

            SardarList::create([
                'sardar_id' => $sardar_id,
                'consultancy_name' => $request->consultancy_name,
                'contact_person' => $request->contact_person,
                'wallet' => 0,
                'address' => $request->address,
                'aadhar_number' => $request->aadhar,
                'mobile1' => $request->mobile1,
                'mobile2' => $request->mobile2,
            ]);

            return redirect()->back()->with('success', 'New Sardar Created');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function updateSardar(Request $request)
    {
        $request->validate([
            'consultancy_name' => 'required',
            'contact_person' => 'required',
            'address' => 'required',
            'aadhar' => 'required',
            'mobile1' => 'required',
            'mobile2' => 'required',
            'id' => 'required'
        ]);
        // dd($request->all());
        try {
            SardarList::where('id', $request->id)->update([
                'consultancy_name' => $request->consultancy_name,
                'contact_person' => $request->contact_person,
                'address' => $request->address,
                'aadhar_number' => $request->aadhar,
                'mobile1' => $request->mobile1,
                'mobile2' => $request->mobile2,
            ]);

            return redirect()->back()->with('success', 'Sardar has been updated');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Somthing went wrong');
        }
    }

}

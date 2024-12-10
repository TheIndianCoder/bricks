<?php

namespace App\Http\Controllers\Vehical;

use App\Http\Controllers\Controller;
use App\Models\Employee\EmployeeList;
use App\Models\Vehical\VehicalGroup;
use App\Models\Vehical\VehicalList;
use App\Models\Vehical\VehicalOwner;
use DB;
use Exception;
use Illuminate\Http\Request;

class VehicalListController extends Controller
{
    public function vehicalList(Request $request)
    {
        if ($request->hasAny('delete_conifrm') && $request->has('delete_conifrm') != null && $request->has('id') != null) {
            $id = $request->id;
            VehicalList::where('id', $id)->delete();

            return redirect()->back()->with('success', 'One record deleted');
        } else {
            $data = [];
            $data['vehicalGroupList'] = VehicalGroup::where('status', 'Active')->get(['id', 'group_name']);
            $data['driverList'] = EmployeeList::where('consultancy_id', 0)->get(['id', 'emp_id', 'name']);
            $data['vehicalOwner'] = VehicalOwner::where('status', 'Active')->get(['id', 'company_name', 'owner_name']);

            // $data['vehicalList'] = VehicalList::get();
            $data['vehicalList'] = DB::table('vehical_lists')
                ->join('vehical_owners', 'vehical_owners.id', '=', 'vehical_lists.owner_id')
                ->join('vehical_groups', 'vehical_groups.id', '=', 'vehical_lists.group_id')
                ->select(
                    'vehical_owners.company_name',
                    'vehical_owners.owner_name',
                    'vehical_groups.group_name',
                    'vehical_lists.vehical_number',
                    'vehical_lists.chassis_number',
                    'vehical_lists.wallet',
                    'vehical_lists.good_for_working',
                    'vehical_lists.poluation_number',
                    'vehical_lists.status',
                    'vehical_lists.id'
                )->get();

            return view('vehical.list', compact('data'));
        }

    }
    public function addVehical(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                "owner_id" => "required",
                "vehical_group_id" => "required",
                "driver_id" => "required",
                "vehical_number" => "required",
                "chessis_number" => "required",
                "poluation_number" => "nullable",
                "good_for_working" => "required",
            ]);

            VehicalList::create([
                'group_id' => $request->vehical_group_id,
                'owner_id' => $request->owner_id,
                'vehical_number' => $request->vehical_number,
                'driver_id' => $request->driver_id,
                'chassis_number' => $request->chessis_number,
                'poluation_number' => $request->poluation_number,
                'good_for_working' => $request->good_for_working,
            ]);

            return redirect()->back()->with('success', 'New Vehical has been created');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function vehicalEditView($id)
    {
        try {
            $data = [];
            $data['vehicalList'] = VehicalList::where('id', $id)->first();

            $data['vehicalGroupList'] = VehicalGroup::where('status', 'Active')->get(['id', 'group_name']);
            $data['driverList'] = EmployeeList::where('consultancy_id', 0)->get(['id', 'emp_id', 'name']);
            $data['vehicalOwner'] = VehicalOwner::where('status', 'Active')->get(['id', 'company_name', 'owner_name']);

            return view('vehical.edit', compact('data'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Somthing went wrong');
        }
    }
    public function vehicalListEdit(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                "owner_id" => "required",
                "vehical_group_id" => "required",
                "driver_id" => "required",
                "vehical_number" => "required",
                "chessis_number" => "required",
                "poluation_number" => "nullable",
                "good_for_working" => "required",
                "id" => "required",
            ]);

            VehicalList::where('id', $request->id)->update([
                'group_id' => $request->vehical_group_id,
                'owner_id' => $request->owner_id,
                'vehical_number' => $request->vehical_number,
                'driver_id' => $request->driver_id,
                'chassis_number' => $request->chessis_number,
                'poluation_number' => $request->poluation_number,
                'good_for_working' => $request->good_for_working,
            ]);

            return redirect()->back()->with('success', 'Vehical has been updated');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Somthing went wrong');
        }
    }
}

<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee\EmployeeGroup;
use App\Models\Employee\EmployeeList;
use App\Models\Sardar\SardarList;
use DB;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // employee group function 
    public function groupList(Request $request)
    {
        // dd($request->all());
        if ($request->hasAny('delete_conifrm') && $request->has('delete_conifrm') != null && $request->has('id') != null) {
            $id = $request->id;
            EmployeeGroup::where('id', $id)->delete();

            return redirect()->back()->with('success', 'One record deleted');
        } else {
            $groupList = EmployeeGroup::get();

            return view('employee.group', compact('groupList'));
        }

    }
    public function groupAdd(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'group_name' => 'Required',
        ]);

        try {
            $request->validate([
                'group_name' => 'required',
            ]);
            EmployeeGroup::create([
                'group_id' => '',
                'group_name' => $request->group_name,
            ]);
            return redirect()->back()->with('success', 'New Group has been added');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function groupEdit(Request $request)
    {


        try {
            $request->validate([
                'group_name' => 'Required',
                'id' => 'Required',
            ]);

            EmployeeGroup::where('id', $request->id)->update([
                'group_name' => $request->group_name,
            ]);
            return redirect()->back()->with('success', 'Group Name has been updated');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Employee function 
    public function addView()
    {
        
        $employeGroup = EmployeeGroup::get();
        $sardarList = SardarList::get();

        return view('employee.add', compact('employeGroup', 'sardarList'));
    }
    public function add(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "labour_type" => "required",
            "sardar_id" => "nullable",
            "labour_name" => "required",
            "mobile" => "required",
            "home_mobile" => "required",
            "aadhar" => "required",
            "dob" => "required",
            "age" => "required",
            "father_name" => "required",
            "address" => "required",
            "state" => "required",
            "district" => "required",
            "pincode" => "required",
            "local_address" => "nullable",
            "local_phone" => "nullable",
            "local_guardian" => "nullable",
        ]);
        try {
            $empId = "EMP00001";
            if ((EmployeeList::count()) != 0) {

                $lastList = EmployeeList::orderBy('id', 'DESC')->first(['emp_id']);
                $lastId = $lastList->emp_id;

                // Extract the numeric part using regex (if the number is always after 'SA')
                preg_match('/(\d+)$/', $lastId, $matches);

                // Increment the number by 1
                $new_number = str_pad($matches[0] + 1, strlen($matches[0]), '0', STR_PAD_LEFT);

                // Combine the prefix 'SA' with the incremented number
                $empId = "EMP" . $new_number;
            }

            EmployeeList::create([
                'emp_id' =>$empId ,
                'name' => $request->labour_name,
                'group_id' => $request->labour_type,
                'consultancy_id' => $request->sardar_id ?? 0,
                'mobile_no' => $request->mobile,
                'home_mobile' => $request->home_mobile,
                'aadhar_no' => $request->aadhar,
                'dob' => $request->dob,
                'age' => $request->age,
                'father_name' => $request->father_name,
                'address' => $request->address,
                'state' => $request->state,
                'district' => $request->district,
                'pin_code' => $request->pincode,
                'local_address' => $request->local_address,
                'local_phone_no' => $request->local_phone,
                'local_guardian' => $request->local_guardian,
                'status' => 'Active',
            ]);
            return redirect()->back()->with('success','New Employee create');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function list(Request $request)
    {
        // dd($request->all());
        if ($request->hasAny('delete_conifrm') && $request->has('delete_conifrm') != null && $request->has('id') != null) {
            $id = $request->id;
            EmployeeList::where('id', $id)->delete();

            return redirect()->back()->with('success', 'One record deleted');
        }else{
            // $employeeList = EmployeeList::all();
            $employeeList = DB::table('employee_lists')
            ->join('employee_groups','employee_groups.id','employee_lists.group_id')
            ->leftjoin('sardar_lists','sardar_lists.id','=','employee_lists.consultancy_id')
            ->select('employee_groups.group_name','sardar_lists.consultancy_name','sardar_lists.contact_person','employee_lists.*')
            ->get();
            // echo "<pre>";
            // print_r($employeeList);
            // die;
        

            return view('employee.list',compact('employeeList'));
        }
        
    }
    public function editView($id)
    {
        try{
            $employee = EmployeeList::findOrFail($id);
            $employeGroup = EmployeeGroup::get();
            $sardarList = SardarList::get();

            return view('employee.edit',compact('employee','employeGroup','sardarList'));

        }catch(Exception $e){
            return redirect()->back()->with('error','Somthing went wrong...');
        }
        
    }
    public function edit(Request $request)
    {
        $request->validate([
            "labour_type" => "required",
            "sardar_id" => "required",
            "labour_name" => "required",
            "mobile" => "required",
            "home_mobile" => "required",
            "aadhar" => "required",
            "dob" => "required",
            "age" => "required",
            "father_name" => "required",
            "address" => "required",
            "state" => "required",
            "district" => "required",
            "pincode" => "required",
            "local_address" => "nullable",
            "local_phone" => "nullable",
            "local_guardian" => "nullable",
            "id" => "required",
        ]);

        try{

            EmployeeList::where('id',$request->id)->update([            
                'name' => $request->labour_name,
                'group_id' => $request->labour_type,
                'consultancy_id' => $request->sardar_id,
                'mobile_no' => $request->mobile,
                'home_mobile' => $request->home_mobile,
                'aadhar_no' => $request->aadhar,
                'dob' => $request->dob,
                'age' => $request->age,
                'father_name' => $request->father_name,
                'address' => $request->address,
                'state' => $request->state,
                'district' => $request->district,
                'pin_code' => $request->pincode,
                'local_address' => $request->local_address,
                'local_phone_no' => $request->local_phone,
                'local_guardian' => $request->local_guardian,
            ]);

            return redirect()->back()->with('success','Labour has been updated');

        }catch(Exception $e){
            return redirect()->back()->with('error','Somthing went wrong');
        }
        
    }

}

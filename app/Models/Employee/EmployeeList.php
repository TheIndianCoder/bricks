<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

class EmployeeList extends Model
{
    protected $table = 'employee_lists';
    protected $fillable = [
        'emp_id',
        'name',
        'group_id',
        'consultancy_id',
        'mobile_no',
        'home_mobile',
        'aadhar_no',
        'dob',
        'age',
        'father_name',
        'address',
        'state',
        'district',
        'pin_code',
        'local_address',
        'local_phone_no',
        'local_guardian',
        'status',
        'wallet'
    ];
}

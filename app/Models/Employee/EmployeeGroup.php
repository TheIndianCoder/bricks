<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

class EmployeeGroup extends Model
{
    protected $table = 'employee_groups';
    protected $fillable = [
        'group_id',
        'group_name',
        'status',
    ];
}

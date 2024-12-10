<?php

namespace App\Models\Vehical;

use Illuminate\Database\Eloquent\Model;

class VehicalList extends Model
{
    protected $table = 'vehical_lists';
    protected $fillable = ['group_id','owner_id','vehical_number','chassis_number','wallet','good_for_working','driver_id','status'];
}

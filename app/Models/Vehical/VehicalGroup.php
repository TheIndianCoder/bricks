<?php

namespace App\Models\Vehical;

use Illuminate\Database\Eloquent\Model;

class VehicalGroup extends Model
{
    protected $table = 'vehical_groups';
    protected $fillable = ['group_name','status'];
}

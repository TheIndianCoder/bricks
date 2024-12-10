<?php

namespace App\Models\Vehical;

use Illuminate\Database\Eloquent\Model;

class VehicalOwner extends Model
{
    protected $table = 'vehical_owners';
    protected $fillable = ['company_name','owner_name','no_of_vehicals','gst_number','registration_no','wallet','status'];
}

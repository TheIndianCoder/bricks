<?php

namespace App\Models\RowMet\Soil;

use Illuminate\Database\Eloquent\Model;

class SoilTip extends Model
{
    protected $table = 'soil_tips';
    protected $fillable = [
        'vehical_id',
        'vehical_number',
        'soil_owner',
        'soil_owner_id',
        'from',
        'where',
        'date',
        'rate_of_tip',
        'no_of_tip',
        'net_amt',
        'status',        
    ];
}

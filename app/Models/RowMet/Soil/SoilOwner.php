<?php

namespace App\Models\RowMet\Soil;

use Illuminate\Database\Eloquent\Model;

class SoilOwner extends Model
{
    protected $table = 'soil_owners';
    protected $fillable = [
        'name',
        'address',
        'contact_no',
        'bigha',
        'deal_amt',
        'total',
        'due',
        'advance',
        'aggrement_paper',
    ];
}

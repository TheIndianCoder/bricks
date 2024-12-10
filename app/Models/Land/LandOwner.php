<?php

namespace App\Models\Land;

use Illuminate\Database\Eloquent\Model;

class LandOwner extends Model
{
    protected $table = 'land_owners';
    protected $fillable = [
        'land_lord',
        'begha',
        'sqt_fet',
        'from_date',
        'to_date',
        'amount',
        'aggrement_date',
        'aggrement_paper',
        'other_details',
        'total',
        'due',
        'advance',
        'status'
    ];
}

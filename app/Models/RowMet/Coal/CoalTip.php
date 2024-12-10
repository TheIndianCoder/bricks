<?php

namespace App\Models\RowMet\Coal;

use Illuminate\Database\Eloquent\Model;

class CoalTip extends Model
{
    protected $table = 'coal_tips';
    protected $fillable = [
        'tip_id',
        'vehical_number',
        'challan_no',
        'date',
        'quantity_kg',
        'type',
        'rate',
        'spend',
        'net_amount',
        'advance',
        'due',
        'file',
    ];
}

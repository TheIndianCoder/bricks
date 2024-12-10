<?php

namespace App\Models\RowMet\Sand;

use Illuminate\Database\Eloquent\Model;

class SandTips extends Model
{
    protected $table = 'sand_tips';
    protected $fillable = [
        'vehical_number',
        'from',
        'where',
        'date',
        'rate_of_tip',
        'no_of_tip',
        'net_amt',
        'due_amt',
        'pay_amt',
        'status',
        'document'
    ];
}

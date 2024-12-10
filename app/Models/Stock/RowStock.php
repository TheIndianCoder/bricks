<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Model;

class RowStock extends Model
{
    protected $table = 'row_stocks';
    protected $fillable = [
        'soil_tip',
        'sand',
        'coal_kg'
    ];
}

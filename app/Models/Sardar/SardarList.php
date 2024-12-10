<?php

namespace App\Models\Sardar;

use Illuminate\Database\Eloquent\Model;

class SardarList extends Model
{
    protected $table = 'sardar_lists';
    protected $fillable = [
        'sardar_id',
        'consultancy_name',
        'contact_person',
        'wallet',
        'address',
        'aadhar_number',
        'mobile1',
        'mobile2',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourismFacilitiesDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'item_name',
        'purpose',
        'time',
        'status',
        'price_description',
        'price'
    ];
}

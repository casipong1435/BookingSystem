<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'price_id',
        'username',
        'status',
        'item_type',
        'start_date',
        'end_date',
        'purpose',
        'quantity'
    ];
}

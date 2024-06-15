<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'price_id',
        'username',
        'item_type',
        'quantity',
    ];
}

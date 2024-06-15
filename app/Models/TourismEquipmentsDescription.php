<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TourismEquipmentsDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'item_name',
        'status',
        'price'
    ];
}

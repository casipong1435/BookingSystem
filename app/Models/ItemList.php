<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemList extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'item_id',
        'quantity',
        'status',
        'description',
        'item_img',
        'item_type',
        'in_charge',
        'featured'
    ];
}

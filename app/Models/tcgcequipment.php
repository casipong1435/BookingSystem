<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tcgcequipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'item_id',
        'status',
        'description',
        'item_img'
    ];
}

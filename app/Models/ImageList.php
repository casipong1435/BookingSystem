<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageList extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'image_name'
    ];
}

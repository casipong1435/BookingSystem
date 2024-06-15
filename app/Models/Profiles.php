<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'date_of_birth',
        'address',
        'zipcode',
        'img_id',
        'contact_number',
        'back_id'
    ];
}

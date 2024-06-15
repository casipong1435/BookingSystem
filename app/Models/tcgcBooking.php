<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tcgcBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'institute',
        'start_date',
        'end_date',
        'item_id',
        'username',
        'activity',
        'chair',
        'table',
        'speaker',
        'microphone',
        'projector',
        'strobing_light',
        'electricfan',
        'volleyball_ball',
        'volleyball_net',
        'basketball_ball',
        'javelin',
        'shotput',
        'soccer_ball',
        'swim_cap',
        'goggle',
        'rostrum',
        'number_of_person',
        'status'
    ];
}

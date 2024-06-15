<?php

namespace App\Livewire\Tcgc;

use Livewire\Component;
use App\Models\tcgcBooking;

class Tcgchistory extends Component
{
    public function render()
    {
        $booking_history = tcgcBooking::join('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                    ->distinct()
                                    ->whereIn('tcgc_bookings.status', [3,4])->get(['tcgc_bookings.item_id','item_lists.item_name', 'item_lists.item_img']);
        return view('livewire.tcgc.tcgchistory', ['booking_history' => $booking_history]);
    }
}

<?php

namespace App\Livewire\Tcgc;

use Livewire\Component;
use App\Models\tcgcBooking;
use App\Models\ItemList;

use Session;

class TcgcHistoryDetails extends Component
{
    public $item_id;
    public $item_img;
    public $item_name;

    public function mount($item_id){
        $this->item_id = $item_id;
        $this->item_img = '';
        $this->item_name = '';
    }

    public function render()
    {

        $item = ItemList::where('item_id', $this->item_id)->first(['item_type', 'item_name', 'item_img']);

        $this->item_name = $item->item_name;
        $this->item_img = $item->item_img;

        $current_reservations = tcgcBooking::join('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                        ->join('profiles','tcgc_bookings.username', '=', 'profiles.username')
                                        ->whereIn('tcgc_bookings.status', [3,4])->get(['start_date', 'end_date', 'first_name', 'last_name', 'tcgc_bookings.created_at', 'tcgc_bookings.status', 'tcgc_bookings.activity', 'number_of_person', 'institute' ,'chair', 'table', 'rostrum']);
        Session::put('history', true);
        return view('livewire.tcgc.tcgc-history-details', ['current_reservations' => $current_reservations]);
    }
}

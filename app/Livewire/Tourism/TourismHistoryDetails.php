<?php

namespace App\Livewire\Tourism;

use Livewire\Component;
use App\Models\Booking;
use App\Models\ItemList;

use Session;

class TourismHistoryDetails extends Component
{
    public $item_id;
    public $item_img;
    public $item_name;
    public $item_type;

    public function mount($item_id){
        $this->item_id = $item_id;
        $this->item_img = '';
        $this->item_name = '';
        $this->item_type = '';
    }

    public function render()
    {
        $item = ItemList::where('item_id', $this->item_id)->first(['item_type', 'item_name', 'item_img']);

        $this->item_name = $item->item_name;
        $this->item_img = $item->item_img;
        $this->item_type = $item->item_type;

        switch($item->item_type){
            case 'equipment':
                    $current_reservations = Booking::join('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                                    ->where('bookings.item_id', $this->item_id)
                                                    ->get(['price', 'bookings.quantity', 'start_date', 'end_date', 'bookings.status', 'first_name', 'last_name', 'bookings.created_at']);
                break;
            
            case 'room':
                    $current_reservations =  Booking::join('tourism_rooms_descriptions', 'bookings.price_id', '=', 'tourism_rooms_descriptions.id')
                                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                                    ->where('bookings.item_id', $this->item_id)
                                                    ->get(['price', 'bookings.quantity', 'start_date', 'end_date', 'bookings.status', 'time', 'aircon', 'price_description', 'first_name', 'last_name', 'bookings.created_at']);
                break;

            case 'facility':
                    $current_reservations =  Booking::join('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                                    ->where('bookings.item_id', $this->item_id)
                                                    ->get(['price', 'bookings.quantity', 'start_date', 'end_date', 'bookings.status','time', 'price_description', 'first_name', 'last_name', 'bookings.created_at']);
                break;
        }

        Session::put('history', true);
        return view('livewire.tourism.tourism-history-details', ['current_reservations' => $current_reservations,]);
    }
}

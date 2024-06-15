<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Booking;
use App\Models\TcgcBooking;
use App\Models\ItemList;

use Carbon\Carbon;

class CheckReservation extends Component
{
    public $item_id;
    public $item_type;
    public $in_charge;
    public $today;
    public $item_name;
    public $item_img;

    public $start_date;
    public $end_date;

    public function mount($item_id){
        $this->item_id = $item_id;
        $this->today = Carbon::now('Asia/Manila');
    }

    public function render()
    {
        $item = ItemList::where('item_id', $this->item_id)->first(['item_type', 'in_charge', 'item_name', 'item_img']);
        $this->item_type = $item->item_type;
        $this->in_charge = $item->in_charge;
        $this->item_name = $item->item_name;
        $this->item_img = $item->item_img;

        //City Reservations
        if($this->in_charge == 'city'){
            switch ($this->item_type){
                case 'room':
                    $current_reservations = Booking::join('tourism_rooms_descriptions', 'bookings.price_id', '=', 'tourism_rooms_descriptions.id')
                                                    ->when($this->start_date, function($query){
                                                        $query->where('bookings.start_date', $this->start_date);
                                                    })->when($this->end_date, function($query){
                                                        $query->where('bookings.end_date', $this->start_date);
                                                    })
                                                    ->where('bookings.item_id', $this->item_id)
                                                    ->whereIn('bookings.status', [0,1,2])
                                                    ->get(['bookings.status', 'start_date', 'end_date', 'time', 'price_description', 'price']);
                    break;
                case 'equipment':
                    $current_reservations = Booking::join('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                                    ->when($this->start_date, function($query){
                                                        $query->where('bookings.start_date', $this->start_date);
                                                    })->when($this->end_date, function($query){
                                                        $query->where('bookings.end_date', $this->start_date);
                                                    })
                                                    ->where('bookings.item_id', $this->item_id)
                                                    ->whereIn('bookings.status', [0,1,2])
                                                    ->get(['bookings.status', 'start_date', 'end_date', 'price']);
                    break;
                case 'facility':
                    $current_reservations = Booking::join('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                                    ->when($this->start_date, function($query){
                                                        $query->where('bookings.start_date', $this->start_date);
                                                    })->when($this->end_date, function($query){
                                                        $query->where('bookings.end_date', $this->start_date);
                                                    })
                                                    ->where('bookings.item_id', $this->item_id)
                                                    ->whereIn('bookings.status', [0,1,2])
                                                    ->get(['bookings.status', 'start_date', 'end_date', 'time', 'price_description', 'price']);
                    break;
            }
        }
        else{
            //TCGC Reservations
            $current_reservations = TcgcBooking::where('item_id', $this->item_id)
                            ->when($this->start_date, function($query){
                                $query->where('tcgc_bookings.start_date', $this->start_date);
                            })->when($this->end_date, function($query){
                                $query->where('tcgc_bookings.end_date', $this->start_date);
                            })
                            ->whereIn('status', [0,1,2])
                            ->get(['tcgc_bookings.status', 'start_date', 'end_date']);
        }
        
        return view('livewire.client.check-reservation', ['current_reservations' => $current_reservations,]);
    }
}

<?php

namespace App\Livewire\Tourism;

use Livewire\Component;
use App\Models\Booking;

use Session;

class Tourismhistory extends Component
{
    public $from;
    public $to;

    public $notif = false;

    public function render()
    {
        $reservation_history_equipment = Booking::join('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                                ->join('item_lists', 'tourism_equipments_descriptions.item_id', '=', 'item_lists.item_id')
                                                ->distinct()
                                                ->where('bookings.item_type', 'equipment')
                                                ->whereIn('bookings.status', [3,4])
                                                ->get(['bookings.item_id', 'bookings.item_type', 'item_lists.item_name', 'item_img']);


       $reservation_history_facility = Booking::join('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                            ->join('item_lists', 'tourism_facilities_descriptions.item_id', '=', 'item_lists.item_id')
                                            ->distinct()
                                            ->where('bookings.item_type', 'facility')
                                            ->whereIn('bookings.status', [3,4])
                                            ->get(['bookings.item_id', 'bookings.item_type', 'item_lists.item_name', 'item_img']);
                                                
        return view('livewire.tourism.tourismhistory',
            [
                'reservation_history_equipment' => $reservation_history_equipment,
                'reservation_history_facility' => $reservation_history_facility
            ]
        );
    }

    public function closeModal(){
        $this->from = '';
        $this->to = '';
        $this->notif = false;
    }

    public function generateReport(){
        $reservation_count = Booking::where('start_date', '>=', $this->from)
                ->where('start_date', '<=', $this->to)
                ->where('status', 3)->count();
        
        if($reservation_count > 0){
            session()->flash('found', $reservation_count);
        }else{
            session()->flash('found', $reservation_count);
        }

        $this->notif = true;
    }
}

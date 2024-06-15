<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Booking;
use App\Models\tcgcBooking;
use Carbon\Carbon;

use PDF;

class MyReservation extends Component
{
    public $username;
    public $today;

    public $state = 0;

    public function mount(){
        $this->username = auth()->user()->username;
        $this->today =  Carbon::now('Asia/Manila');
    }
    
    public function render()
    {
        //Pending
        $pending_booked_equipment = Booking::join('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->whereIn('bookings.status', [0,1])
                                    ->where('bookings.username', $this->username)
                                    ->where('bookings.item_type', 'equipment')->get(['bookings.purpose', 'bookings.status', 'price', 'bookings.id', 'item_name', 'start_date', 'end_date', 'bookings.created_at', 'quantity','bookings.item_type']);
                                    
        $pending_booked_facility = Booking::join('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->whereIn('bookings.status', [0,1])
                                    ->where('bookings.username', $this->username)
                                    ->where('bookings.item_type', 'facility')->get(['bookings.purpose', 'time', 'price_description', 'bookings.status', 'price', 'bookings.id', 'item_name', 'start_date', 'end_date', 'bookings.created_at','bookings.item_type', 'aircon']);
                                    

        $pending_booked_tcgc = tcgcBooking::join('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                    ->where('username', $this->username)
                                    ->whereIn('tcgc_bookings.status', [0,1])
                                    ->get(['tcgc_bookings.id','item_name', 'tcgc_bookings.status', 'number_of_person', 'start_date', 'end_date', 'tcgc_bookings.created_at', 'chair', 'table', 'rostrum', 'activity', 'speaker', 'microphone', 'projector', 'strobing_light', 'electricfan', 'volleyball_ball', 'volleyball_net', 'basketball_ball', 'javelin', 'discus_throw', 'shotput', 'soccer_ball', 'swim_cap', 'goggle']);


        //Accepted
        $accepted_booked_equipment = Booking::join('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->where('bookings.status', 2)
                                    ->where('bookings.username', $this->username)
                                    ->where('bookings.item_type', 'equipment')->get(['bookings.purpose', 'bookings.status', 'price', 'bookings.id', 'item_name', 'start_date', 'end_date', 'bookings.created_at', 'quantity','bookings.item_type']);
                                    
        $accepted_booked_facility = Booking::join('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->where('bookings.status', 2)
                                    ->where('bookings.username', $this->username)
                                    ->where('bookings.item_type', 'facility')->get(['bookings.purpose', 'time', 'price_description', 'bookings.status', 'price', 'bookings.id', 'item_name', 'start_date', 'end_date', 'bookings.created_at','bookings.item_type', 'aircon']);
                                    

        $accepted_booked_tcgc = tcgcBooking::join('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                    ->where('username', $this->username)
                                    ->where('tcgc_bookings.status', 2)
                                    ->get(['tcgc_bookings.id','item_name', 'tcgc_bookings.status', 'number_of_person', 'start_date', 'end_date', 'tcgc_bookings.created_at', 'chair', 'table', 'rostrum', 'activity', 'speaker', 'microphone', 'projector', 'strobing_light', 'electricfan', 'volleyball_ball', 'volleyball_net', 'basketball_ball', 'javelin', 'discus_throw', 'shotput', 'soccer_ball', 'swim_cap', 'goggle']);                         
        

        //Finished
        $finished_booked_equipment = Booking::join('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->where('bookings.status', 3)
                                    ->where('bookings.username', $this->username)
                                    ->where('bookings.item_type', 'equipment')->get(['bookings.purpose', 'bookings.status', 'price', 'bookings.id', 'item_name', 'start_date', 'end_date', 'bookings.created_at', 'quantity']);
                                    
        $finished_booked_facility = Booking::join('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->where('bookings.status', 3)
                                    ->where('bookings.username', $this->username)
                                    ->where('bookings.item_type', 'facility')->get(['bookings.purpose', 'time', 'price_description', 'bookings.status', 'price', 'bookings.id', 'item_name', 'start_date', 'end_date', 'bookings.created_at', 'aircon']);
                                    

        $finished_booked_tcgc = tcgcBooking::join('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                    ->where('username', $this->username)
                                    ->where('tcgc_bookings.status', 3)
                                    ->get(['tcgc_bookings.id','item_name', 'tcgc_bookings.status', 'number_of_person', 'start_date', 'end_date', 'tcgc_bookings.created_at', 'chair', 'table', 'rostrum', 'activity', 'speaker', 'microphone', 'projector', 'strobing_light', 'electricfan', 'volleyball_ball', 'volleyball_net', 'basketball_ball', 'javelin', 'discus_throw', 'shotput', 'soccer_ball', 'swim_cap', 'goggle']);                         

        
        //Rejected
        $rejected_booked_equipment = Booking::join('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->where('bookings.status', 4)
                                    ->where('bookings.username', $this->username)
                                    ->where('bookings.item_type', 'equipment')->get(['bookings.purpose', 'bookings.status', 'price', 'bookings.id', 'item_name', 'start_date', 'end_date', 'bookings.created_at', 'quantity']);
                                    
        $rejected_booked_facility = Booking::join('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->where('bookings.status', 4)
                                    ->where('bookings.username', $this->username)
                                    ->where('bookings.item_type', 'facility')->get(['bookings.purpose', 'time', 'price_description', 'bookings.status', 'price', 'bookings.id', 'item_name', 'start_date', 'end_date', 'bookings.created_at', 'aircon']);
                                    

        $rejected_booked_tcgc = tcgcBooking::join('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                    ->where('username', $this->username)
                                    ->where('tcgc_bookings.status', 4)
                                    ->get(['tcgc_bookings.id','item_name', 'tcgc_bookings.status', 'number_of_person', 'start_date', 'end_date', 'tcgc_bookings.created_at', 'chair', 'table', 'rostrum', 'activity', 'speaker', 'microphone', 'projector', 'strobing_light', 'electricfan', 'volleyball_ball', 'volleyball_net', 'basketball_ball', 'javelin', 'discus_throw', 'shotput', 'soccer_ball', 'swim_cap', 'goggle']);                         

        return view('livewire.client.my-reservation', 
        [
            'pending_booked_equipment' => $pending_booked_equipment, 
            'pending_booked_facility' => $pending_booked_facility, 
            'pending_booked_tcgc' => $pending_booked_tcgc,

            'accepted_booked_equipment' => $accepted_booked_equipment, 
            'accepted_booked_facility' => $accepted_booked_facility, 
            'accepted_booked_tcgc' => $accepted_booked_tcgc,

            'rejected_booked_equipment' => $rejected_booked_equipment, 
            'rejected_booked_facility' => $rejected_booked_facility, 
            'rejected_booked_tcgc' => $rejected_booked_tcgc,

            'finished_booked_equipment' => $finished_booked_equipment, 
            'finished_booked_facility' => $finished_booked_facility, 
            'finished_booked_tcgc' => $finished_booked_tcgc,
        ]);
    }

    public function cancelReservation($reservation_id){
        try{
            Booking::where('id', $reservation_id)->delete();
            session()->flash('delete','Reservation Request Cancelled!');
        }catch(\Exception $e){
            session()->flash('error','Soemthing went wrong!');
        }
    }

    public function cancelTCGCReservation($reservation_id){
        try{
            tcgcBooking::where('id', $reservation_id)->delete();
            session()->flash('delete','Reservation Request Cancelled!');
        }catch(\Exception $e){
            session()->flash('error','Something went wrong!');
        }
    }

    public function changeState($state){
        $this->state = $state;
    }

}

<?php

namespace App\Livewire\Tcgc;

use Livewire\Component;
use App\Models\tcgcBooking;

use Session;

class TcgcReservationDetails extends Component
{
    public $id;
    public $item_id;
    public $item_name;
    public $status;
    public $start_date;
    public $end_date;
    public $name;
    public $institute;
    public $chair;
    public $table;
    public $rostrum;
    public $number_of_person;
    public $created_at;
    public $item_img;
    public $activity;
    public $user_img;
    public $contact_number;
    public $address;
    public $zipcode;
    public $date_of_birth;
    public $back_img;

    public $speaker = 0;
    public $microphone = 0;
    public $projector = 0;
    public $strobing_light = 0;
    public $electricfan = 0;
    public $volleyball_ball = 0;
    public $volleyball_net = 0;
    public $basketball_ball = 0;
    public $javelin = 0;
    public $discus_throw = 0;
    public $shotput = 0;
    public $soccer_ball = 0;
    public $swim_cap = 0;
    public $goggle = 0;


    public function mount($id){
        $this->id = $id;
    }

    public function render()
    {
        $reservation_details = tcgcBooking::join('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                            ->join('profiles', 'tcgc_bookings.username', '=', 'profiles.username')
                                            ->where('tcgc_bookings.id', $this->id)->first(['tcgc_bookings.item_id', 'item_name', 'tcgc_bookings.status', 'start_date', 'end_date', 'first_name', 'last_name', 'institute', 'chair', 'table', 'rostrum', 'number_of_person','activity', 'item_img', 'tcgc_bookings.created_at', 'img_id', 'back_id', 'address', 'contact_number', 'zipcode', 'date_of_birth', 'speaker', 'microphone', 'projector', 'strobing_light', 'electricfan', 'volleyball_ball', 'volleyball_net', 'basketball_ball', 'javelin', 'discus_throw', 'shotput', 'soccer_ball', 'swim_cap', 'goggle']);

        $this->item_id = $reservation_details->item_id;
        $this->item_name = $reservation_details->item_name;
        $this->status = $reservation_details->status;
        $this->start_date = $reservation_details->start_date;
        $this->end_date = $reservation_details->end_date;
        $this->name = ucfirst($reservation_details->first_name).' '.ucfirst($reservation_details->last_name);
        $this->institute = $reservation_details->institute;
        $this->chair = $reservation_details->chair;
        $this->table = $reservation_details->table;
        $this->rostrum = $reservation_details->rostrum;
        $this->number_of_person = $reservation_details->number_of_person;
        $this->created_at = $reservation_details->created_at;
        $this->item_img = $reservation_details->item_img;
        $this->activity = $reservation_details->activity;
        $this->user_img = $reservation_details->img_id;
        $this->back_img = $reservation_details->back_id;
        $this->contact_number = $reservation_details->contact_number;
        $this->address = $reservation_details->address;
        $this->zipcode = $reservation_details->zipcode;
        $this->date_of_birth = $reservation_details->date_of_birth;

        $this->speaker = $reservation_details->speaker;
        $this->microphone = $reservation_details->microphone;
        $this->projector = $reservation_details->projector;
        $this->strobing_light = $reservation_details->strobing_light;
        $this->electricfan = $reservation_details->electricfan;
        $this->volleyball_ball = $reservation_details->volleyball_ball;
        $this->volleyball_net = $reservation_details->volleyball_net;
        $this->basketball_ball = $reservation_details->basketball_ball;
        $this->javelin = $reservation_details->javelin;
        $this->discus_throw = $reservation_details->discus_throw;
        $this->shotput = $reservation_details->shotput;
        $this->soccer_ball = $reservation_details->soccer_ball;
        $this->swim_cap = $reservation_details->swim_cap;
        $this->goggle = $reservation_details->goggle;

        $current_reservation = tcgcBooking::join('profiles', 'tcgc_bookings.username', '=', 'profiles.username')
                                        ->whereIn('status',[0,1,2])
                                        ->where('item_id', $this->item_id)->get(['tcgc_bookings.id','start_date', 'end_date', 'tcgc_bookings.status', 'tcgc_bookings.created_at', 'first_name', 'last_name']);

        Session::put('reservation', true);

        return view('livewire.tcgc.tcgc-reservation-details', ['current_reservation' => $current_reservation]);
    }
}

<?php

namespace App\Livewire\Tourism;

use Livewire\Component;
use App\Models\Booking;

use Session;

class ReservationDetails extends Component
{

    public $id;
    public $item_name;
    public $status;
    public $aircon;
    public $time;
    public $price_description;
    public $quantity;
    public $price;
    public $from;
    public $to;
    public $name;
    public $address;
    public $email;
    public $contact_number;
    public $zipcode;
    public $birth_date;
    public $purpose;
    public $item_img;
    public $user_img;
    public $back_img;


    public function mount($id){
        $this->id = $id;
        
    }

    public function render()
    {
        $item = Booking::where('id', $this->id)->first();

        switch($item->item_type){
            case 'facility':
                $reservation_details = Booking::leftJoin('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                    ->leftJoin('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->leftJoin('users', 'bookings.username', '=', 'users.username')
                                    ->leftJoin('item_lists', 'tourism_facilities_descriptions.item_id', '=', 'item_lists.item_id')
                                    ->where('bookings.id', $this->id)
                                    ->first(['bookings.purpose', 'bookings.status', 'price', 'price_description', 'aircon', 'time', 'item_lists.item_name', 'start_date', 'end_date', 'bookings.created_at', 'bookings.quantity','first_name', 'last_name', 'address', 'date_of_birth', 'item_img', 'email',  'zipcode', 'contact_number', 'img_id', 'back_id']);
                $this->item_name = $reservation_details->item_name;
                $this->status = $reservation_details->status;
                $this->aircon = $reservation_details->aircon;
                $this->time = $reservation_details->time;
                $this->price_description = $reservation_details->price_description;
                $this->quantity = $reservation_details->quantity;
                $this->price = $reservation_details->price;
                $this->from = $reservation_details->start_date;
                $this->to = $reservation_details->end_date;
                $this->name = ucfirst($reservation_details->first_name).' '.ucfirst($reservation_details->last_name);
                $this->address = $reservation_details->address;
                $this->email = $reservation_details->email;
                $this->contact_number = $reservation_details->contact_number;
                $this->zipcode = $reservation_details->zipcode;
                $this->birth_date = $reservation_details->date_of_birth;
                $this->purpose = $reservation_details->purpose;
                $this->item_img = $reservation_details->item_img;
                $this->user_img = $reservation_details->img_id;
                $this->back_img = $reservation_details->back_id;

            break;

            case 'equipment':
                $reservation_details = Booking::leftJoin('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                    ->leftJoin('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->leftJoin('users', 'bookings.username', '=', 'users.username')
                                    ->leftJoin('item_lists', 'tourism_equipments_descriptions.item_id', '=', 'item_lists.item_id')
                                    ->where('bookings.id', $this->id)
                                    ->first(['bookings.purpose', 'bookings.status', 'price', 'item_lists.item_name', 'start_date', 'end_date', 'bookings.created_at', 'bookings.quantity','first_name', 'last_name', 'address', 'date_of_birth', 'item_img', 'email',  'zipcode', 'contact_number', 'img_id', 'back_id']);
                $this->item_name = $reservation_details->item_name;
                $this->status = $reservation_details->status;
                $this->quantity = $reservation_details->quantity;
                $this->price = $reservation_details->price;
                $this->from = $reservation_details->start_date;
                $this->to = $reservation_details->end_date;
                $this->name = ucfirst($reservation_details->first_name).' '.ucfirst($reservation_details->last_name);
                $this->address = $reservation_details->address;
                $this->email = $reservation_details->email;
                $this->contact_number = $reservation_details->contact_number;
                $this->zipcode = $reservation_details->zipcode;
                $this->birth_date = $reservation_details->date_of_birth;
                $this->purpose = $reservation_details->purpose;
                $this->item_img = $reservation_details->item_img;
                $this->user_img = $reservation_details->img_id;
                $this->back_img = $reservation_details->back_id;
                break;
        }

        $current_reservation = Booking::whereIn('status',[0,1,2])
                                        ->where('price_id', $item->price_id)
                                        ->where('item_type', $item->item_type)->get();
        Session::put('reservation', true);
        return view('livewire.tourism.reservation-details', ['current_reservation' => $current_reservation]);
    }
}

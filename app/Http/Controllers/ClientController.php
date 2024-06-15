<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemList;
use App\Models\Booking;

use Session;
use Crypt;
use PDF;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function itemdetails($item_id){
        
        $encrypted_id = Crypt::decrypt($item_id);

        return view('client.itemdetails', ['item_id' => $encrypted_id]);
    }

    public function images($item_id){
        $decrypted_id = Crypt::decrypt($item_id);
        Session::forget('item_type');
        return view('client.more-images', ['decrypted_id' => $decrypted_id]);
    }

    public function myreservation($username){
        
        Session::forget('item_type');
        return view('client.my-reservation');

    }

    public function mycart($username){
        
        Session::forget('item_type');
        return view('client.mycart');
    }

    public function download($id, $item_type) {

        switch($item_type){

            case 'equipment':
                $accepted_booked = Booking::join('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->where('bookings.status', 1)
                                    ->where('bookings.id', $id)
                                    ->where('bookings.item_type', $item_type)->first(['bookings.purpose', 'bookings.status', 'price', 'bookings.id', 'item_name', 'start_date', 'end_date', 'bookings.created_at', 'quantity', 'first_name', 'last_name']);
                break;
            case 'facility':
                $accepted_booked = Booking::join('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->where('bookings.status', 1)
                                    ->where('bookings.id', $id)
                                    ->where('bookings.item_type', $item_type)->first(['bookings.purpose', 'time', 'price_description', 'bookings.status', 'price', 'bookings.id', 'item_name', 'start_date', 'end_date', 'bookings.created_at', 'first_name', 'last_name']);
                break;
        }
        
        $today = Carbon::now('Asia/Manila');

        $pdf = PDF::loadView('pdf.reservation-proof', ['accepted_booked' => $accepted_booked, 'item_type' => $item_type, 'today' => $today]);
        return $pdf->download('invoice-'.$id.'.pdf');
    }
}

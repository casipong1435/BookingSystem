<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Crypt;
use Session;

class TcgcController extends Controller
{
    //
    public function home(){
        Session::forget('reservation');
        Session::forget('history');
        return view('staff-tcgc.home');
    }

    public function images($item_id){
        $decrypted_id = Crypt::decrypt($item_id);
        Session::forget('reservation');
        Session::forget('history');
        return view('staff-tcgc.more-images',['decrypted_id' => $decrypted_id]);
    }

    public function reservation(){
        Session::forget('reservation');
        Session::forget('history');
        return view('staff-tcgc.reservation');
    }

    public function history(){
        Session::forget('reservation');
        return view('staff-tcgc.history');
    }

    public function facilities(){
        Session::forget('reservation');
        Session::forget('history');
        return view('staff-tcgc.facilities');
    }

    public function equipments(){
        Session::forget('reservation');
        Session::forget('history');
        return view('staff-tcgc.equipments');
    }

    public function accounts(){
        Session::forget('reservation');
        Session::forget('history');
        return view('staff-tcgc.account-list');
    }

    public function ReservationDetails($id){ 
        Session::forget('history');
        $encrypted_id = Crypt::decrypt($id);
        
        return view('staff-tcgc.reservation-details',['encrypted_id' => $encrypted_id]);
    }

    public function HistoryDetails($item_id){ 
        Session::forget('reservation');
        $booking_item_id = Crypt::decrypt($item_id);
        
        return view('staff-tcgc.history-details',['booking_item_id' => $booking_item_id]);
    }
}

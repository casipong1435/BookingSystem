<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

use Carbon\Carbon;
use Crypt;
use PDF;
use Session;

class AdminController extends Controller
{
    //

    public function home(){
        Session::forget('reservation');
        Session::forget('item_type');
        Session::forget('history');
        return view('admin-tourism.tourism-home');
    }

    public function reservation(){
        Session::forget('reservation');
        Session::forget('item_type');
        Session::forget('history');
        return view('admin-tourism.reservation');
    }

    public function history(){
        Session::forget('reservation');
        Session::forget('item_type');
        return view('admin-tourism.history');
    }

    public function facilities(){
        Session::forget('reservation');
        Session::forget('item_type');
        Session::forget('history');
        return view('admin-tourism.facilities');
    }

    public function images($item_id){
        $decrypted_id = Crypt::decrypt($item_id);
        Session::forget('reservation');
        Session::forget('item_type');
        Session::forget('history');
        return view('admin-tourism.more-images', ['decrypted_id' => $decrypted_id]);
    }

    public function equipments(){ 
        Session::forget('reservation');
        Session::forget('item_type');
        Session::forget('history');
        return view('admin-tourism.equipments');
    }

    public function accounts(){
        Session::forget('reservation');
        Session::forget('item_type');
        Session::forget('history');
        return view('admin-tourism.account-list');
    }

    public function itempricing($item_id){ 
        Session::forget('reservation');
        Session::forget('history');
        $encrypted_id = Crypt::decrypt($item_id);
        
        return view('admin-tourism.itempricing',['encrypted_id' => $encrypted_id]);
    }

    public function ReservationDetails($id){ 
        Session::forget('history');
        $encrypted_id = Crypt::decrypt($id);
        
        return view('admin-tourism.reservation-details',['encrypted_id' => $encrypted_id]);
    }

    public function HistoryDetails($item_id){ 
        Session::forget('reservation');
        Session::forget('item_type');
        $booking_item_id = Crypt::decrypt($item_id);
        
        return view('admin-tourism.history-details',['booking_item_id' => $booking_item_id]);
    }

    public function generateReport($from, $to){
        $reservation_details = Booking::join('item_lists', 'bookings.item_id', '=', 'item_lists.item_id')
                                ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                ->where('start_date', '>=', $from)
                                ->where('start_date', '<=', $to)
                                ->where('bookings.status', 3)->get(['start_date', 'end_date', 'bookings.created_at', 'first_name', 'last_name', 'item_name','bookings.item_id']);

        $today = Carbon::now('Asia/Manila');
        $pdf = PDF::loadView('pdf.report', ['reservation_details' => $reservation_details, 'from' => $from, 'to' => $to, 'today' => $today]);
        return $pdf->stream($from.'-'.$to.'-report.pdf');
    }
}

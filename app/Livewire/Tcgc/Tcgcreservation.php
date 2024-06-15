<?php

namespace App\Livewire\Tcgc;

use Livewire\Component;
use App\Models\tcgcBooking;
use App\Mail\EmailNotification;

use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;

class Tcgcreservation extends Component
{
    public $search_data = '';
    public $start_date;
    public $end_date;
    public $today;

    public $item_type = '';

    public $state = 0;

    public function mount(){
        $this->today =  Carbon::now('Asia/Manila');
    }
    public function render()
    {
        $reservation_pending = tcgcBooking::join('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                ->join('profiles', 'tcgc_bookings.username', '=', 'profiles.username')
                                ->when($this->start_date, function($query){
                                    $query->where('tcgc_bookings.start_date', $this->start_date);
                                 })->when($this->end_date, function($query){
                                     $query->where('tcgc_bookings.end_date', $this->start_date);
                                 })->where(function($query){
                                     $query->search('profiles.username', $this->search_data)
                                     ->search('profiles.first_name', $this->search_data)
                                     ->search('profiles.last_name', $this->search_data)
                                     ->search('profiles.address', $this->search_data)
                                     ->search('item_lists.item_name', $this->search_data);
                                 })
                                 ->when($this->item_type, function($query){
                                    $query->where('item_type', $this->item_type);
                                 })
                                ->whereIn('tcgc_bookings.status', [0,1])
                                ->orderBy('tcgc_bookings.created_at', 'asc')
                                ->get(['tcgc_bookings.id', 'tcgc_bookings.item_id', 'item_lists.item_name', 'item_lists.item_img', 'institute', 'activity', 'chair', 'table', 'rostrum', 'number_of_person', 'tcgc_bookings.status', 'start_date', 'end_date', 'tcgc_bookings.created_at', 'first_name', 'last_name', 'speaker', 'microphone', 'projector', 'strobing_light', 'electricfan', 'volleyball_ball', 'volleyball_net', 'basketball_ball', 'javelin', 'discus_throw', 'shotput', 'soccer_ball', 'swim_cap', 'goggle']);
                               
        $reservation_accepted = tcgcBooking::join('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                ->join('profiles', 'tcgc_bookings.username', '=', 'profiles.username')
                                ->when($this->start_date, function($query){
                                    $query->where('tcgc_bookings.start_date', $this->start_date);
                                 })->when($this->end_date, function($query){
                                     $query->where('tcgc_bookings.end_date', $this->start_date);
                                 })->where(function($query){
                                     $query->search('profiles.username', $this->search_data)
                                     ->search('profiles.first_name', $this->search_data)
                                     ->search('profiles.last_name', $this->search_data)
                                     ->search('profiles.address', $this->search_data)
                                     ->search('item_lists.item_name', $this->search_data);
                                 })
                                 ->when($this->item_type, function($query){
                                    $query->where('item_type', $this->item_type);
                                 })
                                ->where('tcgc_bookings.status', 2)
                                ->orderBy('tcgc_bookings.created_at', 'asc')
                                ->get(['tcgc_bookings.id', 'tcgc_bookings.item_id', 'item_lists.item_name', 'item_lists.item_img', 'institute', 'activity', 'chair', 'table', 'rostrum', 'number_of_person', 'tcgc_bookings.status', 'start_date', 'end_date', 'tcgc_bookings.created_at', 'first_name', 'last_name', 'speaker', 'microphone', 'projector', 'strobing_light', 'electricfan', 'volleyball_ball', 'volleyball_net', 'basketball_ball', 'javelin', 'discus_throw', 'shotput', 'soccer_ball', 'swim_cap', 'goggle']);      

        $reservation_finished = tcgcBooking::join('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                ->join('profiles', 'tcgc_bookings.username', '=', 'profiles.username')
                                ->when($this->start_date, function($query){
                                    $query->where('tcgc_bookings.start_date', $this->start_date);
                                 })->when($this->end_date, function($query){
                                     $query->where('tcgc_bookings.end_date', $this->start_date);
                                 })->where(function($query){
                                     $query->search('profiles.username', $this->search_data)
                                     ->search('profiles.first_name', $this->search_data)
                                     ->search('profiles.last_name', $this->search_data)
                                     ->search('profiles.address', $this->search_data)
                                     ->search('item_lists.item_name', $this->search_data);
                                 })
                                 ->when($this->item_type, function($query){
                                    $query->where('item_type', $this->item_type);
                                 })
                                ->where('tcgc_bookings.status', 3)
                                ->orderBy('tcgc_bookings.created_at', 'asc')
                                ->get(['tcgc_bookings.id', 'tcgc_bookings.item_id', 'item_lists.item_name', 'item_lists.item_img', 'institute', 'activity', 'chair', 'table', 'rostrum', 'number_of_person', 'tcgc_bookings.status', 'start_date', 'end_date', 'tcgc_bookings.created_at', 'first_name', 'last_name', 'speaker', 'microphone', 'projector', 'strobing_light', 'electricfan', 'volleyball_ball', 'volleyball_net', 'basketball_ball', 'javelin', 'discus_throw', 'shotput', 'soccer_ball', 'swim_cap', 'goggle']);

        $reservation_rejected = tcgcBooking::leftJoin('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                ->join('profiles', 'tcgc_bookings.username', '=', 'profiles.username')
                                ->when($this->start_date, function($query){
                                    $query->where('tcgc_bookings.start_date', $this->start_date);
                                 })->when($this->end_date, function($query){
                                     $query->where('tcgc_bookings.end_date', $this->start_date);
                                 })->where(function($query){
                                     $query->search('profiles.username', $this->search_data)
                                     ->search('profiles.first_name', $this->search_data)
                                     ->search('profiles.last_name', $this->search_data)
                                     ->search('profiles.address', $this->search_data)
                                     ->search('item_lists.item_name', $this->search_data);
                                 })
                                 ->when($this->item_type, function($query){
                                    $query->where('item_type', $this->item_type);
                                 })
                                ->where('tcgc_bookings.status', 4)
                                ->orderBy('tcgc_bookings.created_at', 'asc')
                                ->get(['tcgc_bookings.id', 'tcgc_bookings.item_id', 'item_lists.item_name', 'item_lists.item_img', 'institute', 'activity', 'chair', 'table', 'rostrum', 'number_of_person', 'tcgc_bookings.status', 'start_date', 'end_date', 'tcgc_bookings.created_at', 'first_name', 'last_name', 'speaker', 'microphone', 'projector', 'strobing_light', 'electricfan', 'volleyball_ball', 'volleyball_net', 'basketball_ball', 'javelin', 'discus_throw', 'shotput', 'soccer_ball', 'swim_cap', 'goggle']);
        return view('livewire.tcgc.tcgcreservation', 
        [
            'reservation_pending' => $reservation_pending,
            'reservation_accepted' => $reservation_accepted,
            'reservation_finished' => $reservation_finished,
            'reservation_rejected' => $reservation_rejected,
        ]);
    }

    public function sendEmail($recipient, $name, $description){
        $email = new EmailNotification($name, $description);
        Mail::to($recipient)->send($email);
    }

    public function staffApproval($id){
        try{
            tcgcBooking::where('id', $id)->update(['status' => 1]);
            session()->flash('success', 'Reservation Approved!');

            $user_info = tcgcBooking::join('profiles', 'tcgc_bookings.username', '=', 'profiles.username')
                                ->join('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                ->join('users', 'profiles.username', '=', 'users.username')
                                ->where('tcgc_bookings.id', $id)->first(['first_name', 'last_name', 'email', 'tcgc_bookings.created_at', 'item_name']);
            $name = ucfirst($user_info->first_name).' '.ucfirst($user_info->last_name);

            $description = 'Your Reservation Request for '.$user_info->item_name.' booked on '.$user_info->created_at.' was confirmed! Please wait for the admin approval.';
            $this->sendEmail($user_info->email, $name, $description);

        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function staffCancelApproval($id){
        try{
            tcgcBooking::where('id', $id)->update(['status' => 0]);
            session()->flash('success', 'Reservation Cancelled!');
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function adminApproval($id){
        try{
            tcgcBooking::where('id', $id)->update(['status' => 2]);
            session()->flash('success', 'Reservation Approved!');

            $user_info = tcgcBooking::join('profiles', 'tcgc_bookings.username', '=', 'profiles.username')
                                ->join('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                ->join('users', 'profiles.username', '=', 'users.username')
                                ->where('tcgc_bookings.id', $id)->first(['first_name', 'last_name', 'email', 'tcgc_bookings.created_at', 'item_name']);
            $name = ucfirst($user_info->first_name).' '.ucfirst($user_info->last_name);

            $description = 'Your Reservation Request for '.$user_info->item_name.' booked on '.$user_info->created_at.' was approved!';
            $this->sendEmail($user_info->email, $name, $description);
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function adminCancelApproval($id){
        try{
            tcgcBooking::where('id', $id)->update(['status' => 1]);
            session()->flash('success', 'Reservation Cancelled!');
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function rejectApproval($id){
        try{
            tcgcBooking::where('id', $id)->update(['status' => 4]);
            session()->flash('success', 'Reservation Rejected!');
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }

        $user_info = tcgcBooking::join('profiles', 'tcgc_bookings.username', '=', 'profiles.username')
                                ->join('item_lists', 'tcgc_bookings.item_id', '=', 'item_lists.item_id')
                                ->join('users', 'profiles.username', '=', 'users.username')
                                ->where('tcgc_bookings.id', $id)->first(['first_name', 'last_name', 'email', 'tcgc_bookings.created_at', 'item_name']);
            $name = ucfirst($user_info->first_name).' '.ucfirst($user_info->last_name);

            $description = 'Your Reservation Request for '.$user_info->item_name.' booked on '.$user_info->created_at.' was rejected!';
            $this->sendEmail($user_info->email, $name, $description);
    }

    public function cancelRejectApproval($id){
        try{
            tcgcBooking::where('id', $id)->update(['status' => 0]);
            session()->flash('success', 'Rejection Cancelled!');
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function deleteRejectApproval($id){
        try{
            tcgcBooking::where('id', $id)->delete();
            session()->flash('success', 'Delete Successfull!');
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function deleteRejectApprovalAll(){
        try{
            tcgcBooking::where('status', 4)->delete();
            session()->flash('success', 'Delete Successfull!');
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function changeState($state){
        $this->state = $state;
    }
    
    public function FinishReservation($reservation_id){
        try{
            tcgcBooking::where('id', $reservation_id)->update(['status' => 3]);
            session()->flash('success','Reservation Finished!');
        }catch(\Exception $e){
            session()->flash('error','Something went wrong!');
        }
    }

    public function hasApprovedBookingOnSameDate($startDate, $endDate, $itemId)
    {
        return tcgcBooking::where('start_date', '<=',$endDate)
                    ->where('end_date', '>=', $startDate)
                    ->where('item_id', $itemId)
                    ->where('status', 2)
                    ->exists();
    }
}

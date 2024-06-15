<?php

namespace App\Livewire\Tourism;

use Livewire\Component;
use App\Models\Booking;
use App\Models\User;
use App\Models\EmailMessage;
use App\Models\Profiles;
use Carbon\Carbon;
use App\Mail\EmailNotification;

use Illuminate\Support\Facades\Mail;

class Tourismreservation extends Component
{
    public $search_data = '';
    public $start_date;
    public $end_date;
    public $today;
    public $item_type = '';

    public $email_message;

    public $state = 0;

    public function mount(){
        $this->today =  Carbon::now('Asia/Manila');
    }
    
    public function render()
    {
        //Pending Reservations
        $staff_booked_equipment = Booking::join('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->join('item_lists', 'tourism_equipments_descriptions.item_id', '=', 'item_lists.item_id')
                                    ->when($this->start_date, function($query){
                                        $query->where('bookings.start_date', $this->start_date);
                                     })->when($this->end_date, function($query){
                                         $query->where('bookings.end_date', $this->start_date);
                                     })->where(function($query){
                                         $query->search('profiles.username', $this->search_data)
                                         ->search('profiles.first_name', $this->search_data)
                                         ->search('profiles.last_name', $this->search_data)
                                         ->search('profiles.address', $this->search_data)
                                         ->search('item_lists.item_name', $this->search_data);
                                     })
                                     ->when($this->item_type, function($query){
                                        $query->where('item_lists.item_type', $this->item_type);
                                    })
                                    ->whereIn('bookings.status', [0,1])
                                    ->where('bookings.item_type', 'equipment')
                                    ->orderBy('bookings.created_at', 'asc')
                                    ->get(['bookings.purpose', 'bookings.status', 'price', 'item_lists.item_name', 'start_date', 'end_date', 'bookings.created_at', 'bookings.quantity','first_name', 'last_name', 'address', 'item_img', 'bookings.id', 'bookings.item_id']);

        
        $staff_booked_facility = Booking::join('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->join('item_lists', 'tourism_facilities_descriptions.item_id', '=', 'item_lists.item_id')
                                    ->when($this->start_date, function($query){
                                        $query->where('bookings.start_date', $this->start_date);
                                     })->when($this->end_date, function($query){
                                         $query->where('bookings.end_date', $this->start_date);
                                     })->where(function($query){
                                         $query->search('profiles.username', $this->search_data)
                                         ->search('profiles.first_name', $this->search_data)
                                         ->search('profiles.last_name', $this->search_data)
                                         ->search('profiles.address', $this->search_data)
                                         ->search('item_lists.item_name', $this->search_data);
                                     })
                                     ->when($this->item_type, function($query){
                                        $query->where('item_lists.item_type', $this->item_type);
                                    })
                                    ->whereIn('bookings.status', [0,1])
                                    ->where('bookings.item_type', 'facility')
                                    ->orderBy('bookings.created_at', 'asc')
                                    ->get(['bookings.purpose', 'time', 'price_description', 'bookings.status', 'price', 'bookings.id', 'item_lists.item_name', 'aircon', 'start_date', 'end_date', 'bookings.created_at','first_name', 'last_name', 'address', 'item_img', 'bookings.id', 'bookings.quantity', 'price_description', 'bookings.item_id']);


        $admin_booked_equipment = Booking::join('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->join('item_lists', 'tourism_equipments_descriptions.item_id', '=', 'item_lists.item_id')
                                    ->when($this->start_date, function($query){
                                        $query->where('bookings.start_date', $this->start_date);
                                     })->when($this->end_date, function($query){
                                         $query->where('bookings.end_date', $this->start_date);
                                     })->where(function($query){
                                         $query->search('profiles.username', $this->search_data)
                                         ->search('profiles.first_name', $this->search_data)
                                         ->search('profiles.last_name', $this->search_data)
                                         ->search('profiles.address', $this->search_data)
                                         ->search('item_lists.item_name', $this->search_data);
                                     })
                                     ->when($this->item_type, function($query){
                                        $query->where('item_lists.item_type', $this->item_type);
                                    })
                                    ->whereIn('bookings.status', [0,1])
                                    ->where('bookings.item_type', 'equipment')
                                    ->orderBy('bookings.created_at', 'asc')
                                    ->get(['bookings.purpose', 'bookings.status', 'price', 'bookings.id', 'item_lists.item_name', 'start_date', 'end_date', 'bookings.created_at', 'bookings.quantity','first_name', 'last_name', 'address', 'item_img', 'bookings.quantity', 'bookings.item_id']);

        
        $admin_booked_facility = Booking::join('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->join('item_lists', 'tourism_facilities_descriptions.item_id', '=', 'item_lists.item_id')
                                    ->when($this->start_date, function($query){
                                        $query->where('bookings.start_date', $this->start_date);
                                     })->when($this->end_date, function($query){
                                         $query->where('bookings.end_date', $this->start_date);
                                     })->where(function($query){
                                         $query->search('profiles.username', $this->search_data)
                                         ->search('profiles.first_name', $this->search_data)
                                         ->search('profiles.last_name', $this->search_data)
                                         ->search('profiles.address', $this->search_data)
                                         ->search('item_lists.item_name', $this->search_data);
                                     })
                                     ->when($this->item_type, function($query){
                                        $query->where('item_lists.item_type', $this->item_type);
                                    })
                                    ->whereIn('bookings.status', [0,1])
                                    ->where('bookings.item_type', 'facility')
                                    ->orderBy('bookings.created_at', 'asc')
                                    ->get(['bookings.purpose', 'time', 'price_description', 'bookings.status', 'price', 'bookings.id', 'item_lists.item_name', 'aircon', 'start_date', 'end_date', 'bookings.created_at','first_name', 'last_name', 'address', 'item_img', 'bookings.quantity', 'price_description', 'bookings.item_id']);
                

        //Approved Reservations
        $user_accepted_equipment = Booking::join('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->join('item_lists', 'tourism_equipments_descriptions.item_id', '=', 'item_lists.item_id')
                                    ->when($this->start_date, function($query){
                                        $query->where('bookings.start_date', $this->start_date);
                                     })->when($this->end_date, function($query){
                                         $query->where('bookings.end_date', $this->start_date);
                                     })->where(function($query){
                                         $query->search('profiles.username', $this->search_data)
                                         ->search('profiles.first_name', $this->search_data)
                                         ->search('profiles.last_name', $this->search_data)
                                         ->search('profiles.address', $this->search_data)
                                         ->search('item_lists.item_name', $this->search_data);
                                     })
                                     ->when($this->item_type, function($query){
                                        $query->where('item_lists.item_type', $this->item_type);
                                    })
                                    ->where('bookings.status', 2)
                                    ->where('bookings.item_type', 'equipment')->get(['bookings.purpose', 'bookings.status', 'price', 'bookings.id', 'item_lists.item_name', 'start_date', 'end_date', 'bookings.created_at', 'bookings.quantity','first_name', 'last_name', 'address', 'item_img']);
        
        $user_accepted_facility = Booking::join('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->join('item_lists', 'tourism_facilities_descriptions.item_id', '=', 'item_lists.item_id')
                                    ->when($this->start_date, function($query){
                                        $query->where('bookings.start_date', $this->start_date);
                                     })->when($this->end_date, function($query){
                                         $query->where('bookings.end_date', $this->start_date);
                                     })->where(function($query){
                                         $query->search('profiles.username', $this->search_data)
                                         ->search('profiles.first_name', $this->search_data)
                                         ->search('profiles.last_name', $this->search_data)
                                         ->search('profiles.address', $this->search_data)
                                         ->search('item_lists.item_name', $this->search_data);
                                     })
                                     ->when($this->item_type, function($query){
                                        $query->where('item_lists.item_type', $this->item_type);
                                    })
                                    ->where('bookings.status', 2)
                                    ->where('bookings.item_type', 'facility')->get(['bookings.purpose', 'time', 'price_description', 'bookings.status', 'price', 'bookings.id', 'item_lists.item_name', 'aircon', 'start_date', 'end_date', 'bookings.created_at','first_name', 'last_name', 'address', 'item_img', 'bookings.quantity', 'price_description']);


        //Completed Reservations
        $user_finished_equipment = Booking::join('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->join('item_lists', 'tourism_equipments_descriptions.item_id', '=', 'item_lists.item_id')
                                    ->when($this->start_date, function($query){
                                        $query->where('bookings.start_date', $this->start_date);
                                     })->when($this->end_date, function($query){
                                         $query->where('bookings.end_date', $this->start_date);
                                     })->where(function($query){
                                         $query->search('profiles.username', $this->search_data)
                                         ->search('profiles.first_name', $this->search_data)
                                         ->search('profiles.last_name', $this->search_data)
                                         ->search('profiles.address', $this->search_data)
                                         ->search('item_lists.item_name', $this->search_data);
                                     })
                                     ->when($this->item_type, function($query){
                                        $query->where('item_lists.item_type', $this->item_type);
                                    })
                                    ->where('bookings.status', 3)
                                    ->where('bookings.item_type', 'equipment')->get(['bookings.purpose', 'bookings.status', 'price', 'bookings.id', 'item_lists.item_name', 'start_date', 'end_date', 'bookings.created_at', 'bookings.quantity','first_name', 'last_name', 'address', 'item_img', 'bookings.quantity']);
        
        $user_finished_facility = Booking::join('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->join('item_lists', 'tourism_facilities_descriptions.item_id', '=', 'item_lists.item_id')
                                    ->when($this->start_date, function($query){
                                        $query->where('bookings.start_date', $this->start_date);
                                     })->when($this->end_date, function($query){
                                         $query->where('bookings.end_date', $this->start_date);
                                     })->where(function($query){
                                         $query->search('profiles.username', $this->search_data)
                                         ->search('profiles.first_name', $this->search_data)
                                         ->search('profiles.last_name', $this->search_data)
                                         ->search('profiles.address', $this->search_data)
                                         ->search('item_lists.item_name', $this->search_data);
                                     })
                                     ->when($this->item_type, function($query){
                                        $query->where('item_lists.item_type', $this->item_type);
                                    })
                                    ->where('bookings.status', 3)
                                    ->where('bookings.item_type', 'facility')->get(['bookings.purpose', 'time', 'price_description', 'bookings.status', 'price', 'bookings.id', 'item_lists.item_name', 'aircon', 'start_date', 'end_date', 'bookings.created_at','first_name', 'last_name', 'address', 'item_img','price_description']);


        //Rejected Reservations
        $user_rejected_equipment = Booking::join('tourism_equipments_descriptions', 'bookings.price_id', '=', 'tourism_equipments_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->join('item_lists', 'tourism_equipments_descriptions.item_id', '=', 'item_lists.item_id')
                                    ->when($this->start_date, function($query){
                                        $query->where('bookings.start_date', $this->start_date);
                                     })->when($this->end_date, function($query){
                                         $query->where('bookings.end_date', $this->start_date);
                                     })->where(function($query){
                                         $query->search('profiles.username', $this->search_data)
                                         ->search('profiles.first_name', $this->search_data)
                                         ->search('profiles.last_name', $this->search_data)
                                         ->search('profiles.address', $this->search_data)
                                         ->search('item_lists.item_name', $this->search_data);
                                     })
                                     ->when($this->item_type, function($query){
                                        $query->where('item_lists.item_type', $this->item_type);
                                    })
                                    ->where('bookings.status', 4)
                                    ->where('bookings.item_type', 'equipment')->get(['bookings.purpose', 'bookings.status', 'price', 'bookings.id', 'item_lists.item_name', 'start_date', 'end_date', 'bookings.created_at', 'bookings.quantity','first_name', 'last_name', 'address', 'item_img']);


        $user_rejected_facility = Booking::join('tourism_facilities_descriptions', 'bookings.price_id', '=', 'tourism_facilities_descriptions.id')
                                    ->join('profiles', 'bookings.username', '=', 'profiles.username')
                                    ->join('item_lists', 'tourism_facilities_descriptions.item_id', '=', 'item_lists.item_id')
                                    ->when($this->start_date, function($query){
                                        $query->where('bookings.start_date', $this->start_date);
                                     })->when($this->end_date, function($query){
                                         $query->where('bookings.end_date', $this->start_date);
                                     })->where(function($query){
                                         $query->search('profiles.username', $this->search_data)
                                         ->search('profiles.first_name', $this->search_data)
                                         ->search('profiles.last_name', $this->search_data)
                                         ->search('profiles.address', $this->search_data)
                                         ->search('item_lists.item_name', $this->search_data);
                                     })
                                     ->when($this->item_type, function($query){
                                        $query->where('item_lists.item_type', $this->item_type);
                                    })
                                    ->where('bookings.status', 4)
                                    ->where('bookings.item_type', 'facility')->get(['bookings.purpose', 'time', 'price_description', 'bookings.status', 'price', 'bookings.id', 'item_lists.item_name', 'aircon', 'start_date', 'end_date', 'bookings.created_at','first_name', 'last_name', 'address', 'item_img', 'price_description']);


        return view('livewire.tourism.tourismreservation', 
        [
            'staff_booked_equipment' => $staff_booked_equipment, 
            'staff_booked_facility' => $staff_booked_facility, 
            'admin_booked_equipment' => $admin_booked_equipment, 
            'admin_booked_facility' => $admin_booked_facility,
            'user_accepted_equipment' => $user_accepted_equipment, 
            'user_accepted_facility' => $user_accepted_facility,  
            'user_finished_equipment' => $user_finished_equipment, 
            'user_finished_facility' => $user_finished_facility,
            'user_rejected_equipment' => $user_rejected_equipment, 
            'user_rejected_facility' => $user_rejected_facility,   
        ]);
    }

    public function sendEmail($recipient, $name, $description){
        $email = new EmailNotification($name, $description);
        Mail::to($recipient)->send($email);
    }

    public function staffApproval($id){
        try{
            Booking::where('id', $id)->update(['status' => 1]);
            session()->flash('success', 'Reservation Approved!');

            $user_info = Booking::join('profiles', 'bookings.username', '=', 'profiles.username')
                                ->join('item_lists', 'bookings.item_id', '=', 'item_lists.item_id')
                                ->join('users', 'profiles.username', '=', 'users.username')
                                ->where('bookings.id', $id)->first(['first_name', 'last_name', 'email', 'bookings.created_at', 'item_name']);
            $name = ucfirst($user_info->first_name).' '.ucfirst($user_info->last_name);

            $description = 'Your Reservation Request for '.$user_info->item_name.' booked on '.$user_info->created_at.' was confirmed. To complete your reservation request, please download the receipt in your account reservation and present it to the Tangub City, Tourism Office. Thank you!';
            $this->sendEmail($user_info->email, $name, $description);

        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function staffCancelApproval($id){
        try{
            Booking::where('id', $id)->update(['status' => 0]);
            session()->flash('success', 'Reservation Cancelled!');
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function adminApproval($id){
        try{
            Booking::where('id', $id)->update(['status' => 2]);
            session()->flash('success', 'Reservation Approved!');

            $user_info = Booking::join('profiles', 'bookings.username', '=', 'profiles.username')
                                ->join('item_lists', 'bookings.item_id', '=', 'item_lists.item_id')
                                ->join('users', 'profiles.username', '=', 'users.username')
                                ->where('bookings.id', $id)->first(['first_name', 'last_name', 'email', 'bookings.created_at', 'item_name']);
            $name = ucfirst($user_info->first_name).' '.ucfirst($user_info->last_name);

            $description = 'Your Reservation Request for '.$user_info->item_name.' booked on '.$user_info->created_at.' was approved. Thank you!';
            $this->sendEmail($user_info->email, $name, $description);

        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function adminCancelApproval($id){
        try{
            Booking::where('id', $id)->update(['status' => 1]);
            session()->flash('success', 'Reservation Cancelled!');
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function rejectApproval($id){
        try{
            Booking::where('id', $id)->update(['status' => 4]);
            session()->flash('success', 'Reservation Rejected!');

            $user_info = Booking::join('profiles', 'bookings.username', '=', 'profiles.username')
                                ->join('item_lists', 'bookings.item_id', '=', 'item_lists.item_id')
                                ->join('users', 'profiles.username', '=', 'users.username')
                                ->where('bookings.id', $id)->first(['first_name', 'last_name', 'email', 'bookings.created_at', 'item_name']);
            $name = ucfirst($user_info->first_name).' '.ucfirst($user_info->last_name);

            $description = 'Your Reservation Request for '.$user_info->item_name.' booked on '.$user_info->created_at.' was rejected!';
            $this->sendEmail($user_info->email, $name, $description);
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function cancelRejectApproval($id){
        try{
            Booking::where('id', $id)->update(['status' => 0]);
            session()->flash('success', 'Rejection Cancelled!');
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function deleteRejectApproval($id){
        try{
            Booking::where('id', $id)->delete();
            session()->flash('success', 'Delete Successfull!');
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function deleteRejectApprovalAll(){
        try{
            Booking::where('status', 4)->delete();
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
            Booking::where('id', $reservation_id)->update(['status' => 3]);
            session()->flash('success','Reservation Finished!');
        }catch(\Exception $e){
            session()->flash('error','Something went wrong!');
        }
    }

    public function hasApprovedBookingOnSameDate($startDate, $endDate, $itemId)
    {
        return Booking::where('start_date', '<=',$endDate)
                    ->where('end_date', '>=', $startDate)
                    ->where('item_id', $itemId)
                    ->where('status', 2)
                    ->exists();
    }
}

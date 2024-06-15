<?php

namespace App\Livewire\Tcgc;

use Livewire\Component;
use App\Models\User;
use App\Models\tcgcBooking;

use Carbon\Carbon;

class TcgcHome extends Component
{
    public $name;
    public $pending_user_count = 0;
    public $total_user = 0;
    public $pending_booking;
    public $ongoing_booking;
    public $completed_booking;
    public $today;

    public function mount(){
        $this->today = Carbon::now('Asia/Manila');
    }
    public function render()
    {
        $user = User::join('profiles', 'users.username', '=', 'profiles.username')
                        ->where('users.username', auth()->user()->username)->first(['first_name', 'last_name']);
        $this->name = ucfirst($user->first_name). ' '.ucfirst($user->last_name);

        $this->pending_user_count = User::where('usertype', 1)->count();
        $this->total_user = User::where('status', 1)->where('usertype', 2)->count();

        $this->pending_booking = tcgcBooking::whereIn('status', [0,1])->count();
        $this->ongoing_booking = tcgcBooking::where('status', 2)
                                        ->where('start_date', '<=', $this->today)
                                        ->where('end_date', '>=', $this->today)->count();
        $this->completed_booking = tcgcBooking::where('status', 3)->count();

        return view('livewire.tcgc.tcgc-home');
    }
}

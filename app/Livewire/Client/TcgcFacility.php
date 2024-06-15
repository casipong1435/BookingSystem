<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\ItemList;
use App\Models\tcgcBooking;
use App\Models\Profiles;

use Carbon\Carbon;


class TcgcFacility extends Component
{
    public $item_id = '';
    public $item_name;
    public $activity;
    public $institute;

    public $start_date;
    public $end_date;
    public $table = 0;
    public $chair = 0;
    public $rostrum = 0;
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
    public $number_of_person = 0;
    public $isBooked = false;

    public $search_data = '';
    public $search_user;

    public $state = 0;

    public $username;

    public $name;
    public $contact_number;
    public $address;
    public $email;
    public $img_id;
    public $back_id;
    public $zipcode;
    public $date_of_birth;

    public $selected_user = false;

    public function resetField(){
        $this->activity = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->institute = '';
        $this->item_id = '';
        $this->table = 0;
        $this->chair = 0;
        $this->rostrum = 0;
        $this->number_of_person = 0;
        $this->isBooked = false;
    }

    public function CloseModal(){
        $this->resetField();
    }

    public function render()
    {


        $tcgc_item = ItemList::where('item_type', 'facility')
                                ->where(function($query){
                                    $query->search('item_name', $this->search_data);
                                })
                               ->where('status', 1)
                                ->where('in_charge', 'tcgc')
                                ->orderBy('created_at', 'desc')->get();



        $profiles = Profiles::leftJoin('users', 'profiles.username', '=', 'users.username')
                                ->where(function($query){
                                    $query->search('profiles.first_name', $this->search_user)
                                    ->search('profiles.last_name', $this->search_user)
                                    ->search('profiles.username', $this->search_user)
                                    ->search('profiles.address', $this->search_user)
                                    ->search('profiles.zipcode', $this->search_user)
                                    ->search('profiles.date_of_birth', $this->search_user);
                                })
                                ->get();

        if($this->username != null){
            $selected_profile = Profiles::leftJoin('users', 'profiles.username', '=', 'users.username')
                                            ->where('profiles.username', $this->username)->first();

            $this->name = ucfirst($selected_profile->first_name).' '.ucfirst($selected_profile->last_name);
            $this->contact_number = $selected_profile->contact_number;
            $this->address = $selected_profile->address;
            $this->email = $selected_profile->address;
            $this->img_id = $selected_profile->img_id;
            $this->back_id = $selected_profile->back_id;
            $this->zipcode = $selected_profile->zipcode;
            $this->date_of_birth = $selected_profile->date_of_birth;
        }
                                
        return view('livewire.client.tcgc-facility', ['tcgc_item' => $tcgc_item, 'profiles' => $profiles]);
    }

    public function getcgcItemData($item_id){
        $this->item_id = $item_id;
        $item = ItemList::where('item_id', $item_id)->first();
        $this->item_name = $item->item_name;
        

        $username = auth()->user()->username;
        $current_booked = tcgcBooking::where('item_id', $item_id)
                                        ->where('username', $username)
                                        ->whereIn('status', [0,1,2])->count();
        if ($current_booked > 3){
            $this->isBooked = true;
        }
    }

    public function getUsername($username){

        $this->selected_user = true;
        $this->username =  $username;
    }

    public function cancelSelect(){

        $this->selected_user = false;
        $this->username = null;
    }

    public function bookNowTCGC(){

        if ($this->state == 0){
            $validate = $this->validate([
                'activity' => 'required',
                'institute' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'number_of_person' => 'required'
            ]);
    
            try{
    
                $formatStartDate = Carbon::parse($this->start_date)->format('Y-m-d');
    
                $isAlreadyBooked = tcgcBooking::whereDate("start_date", $formatStartDate)
                                                ->whereIn('status', [0, 1, 2])
                                                ->where('username', $this->username)
                                                ->count();
    
                $BookedLimit = tcgcBooking::where('start_date', '<=',$this->end_date)
                                        ->where('end_date', '>=', $this->start_date)
                                        ->whereIn('status', [1,2])
                                        ->where('item_id', $this->item_id)->count();
    
                $username = auth()->user()->username;
    
                if($isAlreadyBooked > 0){
                    session()->flash('fail', 'You already made a booking for this day!');
                }else{
                    if($BookedLimit < 1){
                        $values = [
                            'item_id' => $this->item_id,
                            'username' => $username,
                            'activity' => $this->activity,
                            'start_date' => $this->start_date,
                            'end_date' => $this->end_date,
                            'institute' => $this->institute,
                            'number_of_person' => $this->number_of_person,
                            'chair' => $this->chair,
                            'table' => $this->table,
                            'rostrum' => $this->rostrum,
                            'speaker' => $this->speaker,
                            'microphone' => $this->microphone,
                            'projector' => $this->projector,
                            'strobing_light' => $this->strobing_light,
                            'electricfan' => $this->electricfan,
                            'volleyball_ball' => $this->volleyball_ball,
                            'volleyball_net' => $this->volleyball_net,
                            'basketball_ball' => $this->basketball_ball,
                            'javelin' => $this->javelin,
                            'discus_throw' => $this->discus_throw,
                            'shotput' => $this->shotput,
                            'soccer_ball' => $this->soccer_ball,
                            'swim_cap' => $this->swim_cap,
                            'goggle' => $this->goggle,
                            'status' => 0
                        ];
            
                        
                        tcgcBooking::create($values);
                        session()->flash('success', 'Booking Successfull!');
                        $this->closeModal();
                        $this->dispatch('hide:book-modal');
                    }else{
                        session()->flash('fail', 'Someone booked for this date!');
                    }
                }
            }catch (\Exception $e){
                session()->flash('error', 'Something went wrong!!');
            }
        }else{
            $validate = $this->validate([
                'activity' => 'required',
                'institute' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'number_of_person' => 'required',
                'username' => 'required'
            ]);
    
            try{
    
                $formatStartDate = Carbon::parse($this->start_date)->format('Y-m-d');
    
                $isAlreadyBooked = tcgcBooking::whereDate("start_date", $formatStartDate)
                                                ->whereIn('status', [0, 1, 2])
                                                ->where('username', $this->username)
                                                ->count();
    
                $BookedLimit = tcgcBooking::where('start_date', '<=',$this->end_date)
                                        ->where('end_date', '>=', $this->start_date)
                                        ->whereIn('status', [1,2])
                                        ->where('item_id', $this->item_id)->count();
    
                if($isAlreadyBooked > 0){
                    session()->flash('fail', 'You already made a booking for this day!');
                }else{
                    if($BookedLimit < 1){
                        $values = [
                            'item_id' => $this->item_id,
                            'username' => $this->username,
                            'activity' => $this->activity,
                            'start_date' => $this->start_date,
                            'end_date' => $this->end_date,
                            'institute' => $this->institute,
                            'number_of_person' => $this->number_of_person,
                            'chair' => $this->chair,
                            'table' => $this->table,
                            'rostrum' => $this->rostrum,
                            'speaker' => $this->speaker,
                            'microphone' => $this->microphone,
                            'projector' => $this->projector,
                            'strobing_light' => $this->strobing_light,
                            'electricfan' => $this->electricfan,
                            'volleyball_ball' => $this->volleyball_ball,
                            'volleyball_net' => $this->volleyball_net,
                            'basketball_ball' => $this->basketball_ball,
                            'javelin' => $this->javelin,
                            'discus_throw' => $this->discus_throw,
                            'shotput' => $this->shotput,
                            'soccer_ball' => $this->soccer_ball,
                            'swim_cap' => $this->swim_cap,
                            'goggle' => $this->goggle,
                            'status' => 1
                        ];

            
                        
                        tcgcBooking::create($values);
                        session()->flash('success', 'Booking Successfull!');
                        $this->closeModal();
                        $this->dispatch('hide:book-modal');
                    }else{
                        session()->flash('fail', 'Someone booked for this date!');
                    }
                }
            }catch (\Exception $e){
                session()->flash('error', 'Something went wrong!!');
            }
        }

    }

    public function changeBooker($state){
        $this->state = $state;
    }

}

<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\ItemList;
use App\Models\tcgcBooking;

class Equipment extends Component
{
    public $item_id = '';
    public $item_name;
    public $activity;
    public $institute;
    public $username;
    public $start_date;
    public $end_date;
    public $table = 0;
    public $chair = 0;
    public $rostrum = 0;
    public $number_of_person = 0;
    public $isBooked = false;

    public $isTCGC = false;
    public $isCity = true;

    public $search_data = '';

    public function mount(){
        if(auth()->check()){
            $this->username = auth()->user()->username;
        }
    }

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
        $item_data = ItemList::where('item_type', 'equipment')
                                ->where(function($query){
                                    $query->search('item_name', $this->search_data);
                                })
                                ->where('status', 1)
                                ->where('in_charge', 'city')
                                ->orderBy('created_at', 'desc')->get();

        $tcgc_item = ItemList::where('item_type', 'equipment')
                                ->where(function($query){
                                    $query->search('item_name', $this->search_data);
                                })
                                ->where('status', 1)
                                ->where('in_charge', 'tcgc')
                                ->orderBy('created_at', 'desc')->get();
                                
        return view('livewire.client.equipment', ['item_data' => $item_data, 'tcgc_item' => $tcgc_item]);
    }

    public function getcgcItemData($item_id){
        $item = ItemList::where('item_id', $item_id)->first();
        $this->item_name = $item->item_name;
        $this->item_id = $item_id;

        $current_booked = tcgcBooking::where('item_id', $item_id)
                                        ->where('username', $this->username)
                                        ->whereIn('status', [0,1,2])->first();
        if ($current_booked){
            $this->isBooked = true;
        }
    }

    public function bookNowTCGC(){

        $validate = $this->validate([
            'activity' => 'required',
            'institute' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'number_of_person' => 'required'
        ]);

        try{
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
                'status' => 0
            ];
            tcgcBooking::create($values);
            session()->flash('success', 'Booking Successfull!');
            $this->closeModal();
            $this->dispatch('hide:book-modal');
        }catch (\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }

    }

    public function clickTCGC(){
        $this->isTCGC = true;
        $this->isCity = false;
    }

    public function clickCity(){
        $this->isCity = true;
        $this->isTCGC = false;
    }
}

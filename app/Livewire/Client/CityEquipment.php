<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\ItemList;
use App\Models\tcgcBooking;

class CityEquipment extends Component
{
    public $username;

    public $search_data = '';

    public function mount(){
        if(auth()->check()){
            $this->username = auth()->user()->username;
        }
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

                                
        return view('livewire.client.city-equipment', ['item_data' => $item_data]);
    }

}

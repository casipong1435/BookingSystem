<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\ItemList;

class Cityfacility extends Component
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
        $item_data = ItemList::where('item_type', 'facility')
                                ->where(function($query){
                                    $query->search('item_name', $this->search_data);
                                })
                               ->where('status', 1)
                                ->where('in_charge', 'city')
                                ->orderBy('created_at', 'desc')->get();

        return view('livewire.client.city-facility', ['item_data' => $item_data]);
    }

}

<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\ItemList;

class Index extends Component
{
    public function render()
    {
        $tcgc_featured_items = ItemList::where('featured', 1)->where('in_charge', 'tcgc')->get('item_img');
        $city_featured_items = ItemList::where('featured', 1)->where('in_charge', 'city')->get('item_img');

        $equipments = ItemList::where('item_type', 'equipment')
                        ->where('in_charge', 'city')
                        ->latest()
                        ->limit(3)->get(['item_img', 'item_id', 'item_name', 'description']);
        $facilities = ItemList::where('item_type', 'facility')
                        ->where('in_charge', 'city')
                        ->limit(3)->get(['item_img', 'item_id', 'item_name', 'description']);

        return view('livewire.client.index', 
            [
                'tcgc_featured_items' => $tcgc_featured_items, 
                'city_featured_items' => $city_featured_items,
                'equipments' => $equipments,
                'facilities' => $facilities
            ]
        );
    }
}

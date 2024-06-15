<?php

namespace App\Livewire\Client;
use App\Models\ItemList;
use App\Models\ImageList;

use Livewire\Component;

class MoreImages extends Component
{
    public $item_id;
    public $item_name;
    public $in_charge;

    public function mount($item_id){
        $this->item_id = $item_id;
    }

    public function render()
    {
        $item = ItemList::where('item_id', $this->item_id)->first(['item_name', 'in_charge']);
        $images = ImageList::where('item_id', $this->item_id)->get('image_name');
        $this->item_name = $item->item_name;
        $this->in_charge = $item->in_charge;
        return view('livewire.client.more-images', ['images' => $images]);
    }
}

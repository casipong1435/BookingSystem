<?php

namespace App\Livewire\Tcgc;

use Livewire\Component;
use App\Models\ItemList;
use App\Models\ImageList;
use Livewire\WithFileUploads;

class MoreImages extends Component
{
    use WithFileUploads;

    public $item_id;
    public $item_name;

    public $photos = [];

    public function mount($item_id){
        $this->item_id = $item_id;
    }

    public function render()
    {
        $item = ItemList::where('item_id', $this->item_id)->first(['item_name']);
        $images = ImageList::where('item_id', $this->item_id)->get('image_name');
        $this->item_name = $item->item_name;
        return view('livewire.tcgc.more-images', ['images' => $images]);
    }

    public function addImage(){
        $this->validate([
            'photos.*' => 'image|max:1024', 
        ]);
        try{
            foreach($this->photos as $photo){
                $filename = time().'.'.$photo->getClientOriginalExtension();
                $photo->storeAs('tcgc-more-images', $filename);
                ImageList::create(['item_id' => $this->item_id, 'image_name' => $filename]);
                session()->flash('success', 'Image Uploaded');
                $this->dispatch('hide:modal');
            }
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
            $this->dispatch('hide:modal');
        }
    }

    public function deleteImage($image_name){
        ImageList::where('image_name', $image_name)->delete();

        $filepath = public_path('/images/tcgc-more-images/'.$image_name);

        if(file_exists($filepath)){
            unlink($filepath);
        }
    }
}

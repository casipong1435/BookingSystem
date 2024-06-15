<?php

namespace App\Livewire\Tcgc;

use Livewire\Component;
use App\Models\ItemList;
use Livewire\WithFileUploads;

class Tcgcfacilities extends Component
{
    use WithFileUploads;

    public $item_id;
    public $item_name;
    public $item_description;
    public $item_quantity = 1;
    public $item_type;
    public $image;
    public $data_image;
    public $in_charge;

    public $search_data = '';

    public function mount(){
        $this->item_type = 'facility';
        $this->in_charge = 'tcgc';
    }

    public function resetFields(){
        $this->item_name = '';
        $this->item_description = '';
        $this->item_quantity = 1;
        $this->data_image = '';
        $this->image = null;
        $this->item_id = '';
    }

    public function closeModal(){
        $this->resetFields();
    }

    public function render()
    {
        $facility_tcgc = ItemList::where('item_type', 'facility')
                                ->where(function($query){
                                    $query->search('item_name', $this->search_data);
                                })
                                ->where('in_charge', 'tcgc')->orderBy('created_at', 'desc')->get();
        return view('livewire.tcgc.tcgcfacilities', ['facility_tcgc' => $facility_tcgc]);
    }

    public function addItem(){

        $this->validate([
            'item_name' => 'required',
            'item_quantity' => 'required',
            'image' => 'required|image|max:2048'
        ]);

        $this->item_id = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        $check_if_id_exist = ItemList::where('item_id', $this->item_id)->first();

        if ($check_if_id_exist){
            $this->item_id += 1;
        }

        $folderPath = public_path().'/images/tcgc-items/';
        $filename = time().'.'.$this->image->getClientOriginalExtension();

        $newItem = [
            'item_id' => $this->item_id,
            'item_name' => $this->item_name,
            'quantity' => $this->item_quantity,
            'description' => $this->item_description,
            'item_type' => $this->item_type,
            'in_charge' => $this->in_charge,
            'item_img' => $filename,
            'status' => 1
        ];

        try {
            ItemList::create($newItem);
            $this->image->storeAs('tcgc-items', $filename);
            session()->flash('success','Item Added Successfully!!');
            $this->resetFields();
            $this->dispatch('hide:add-modal');
        } catch (\Exception $e){
            session()->flash('error','Something goes wrong!!');
        }
    }

    public function deleteItem($item_id, $item_image){
        $this->item_id = $item_id;


        try{
            ItemList::where('item_id', $this->item_id)->delete();
            
            $filepath = public_path('/images/tcgc-items/'.$item_image);
            if(file_exists($filepath)){
                unlink($filepath);
            }
            session()->flash('success','Item Delete Successfully!!');
        }catch (\Exception $e){
            session()->flash('error','Something goes wrong!!');
        }
    }

    public function archiveItem($item_id){
        $this->item_id = $item_id;

        try{
            ItemList::where('item_id', $this->item_id)->update(['status' => 2]);
            session()->flash('success','Item Archived!!');
        }catch (\Exception $e){
            session()->flash('error','Something goes wrong!!');
        }
    }

    public function unarchiveItem($item_id){
        $this->item_id = $item_id;
        try{
            ItemList::where('item_id', $this->item_id)->update(['status' => 1]);
            session()->flash('success','Item Unarchived!!');
        }catch (\Exception $e){
            session()->flash('error','Something goes wrong!!');
        }
    }

    public function getItemID($id){
        $item = ItemList::where('item_id', $id)->first();
        $this->item_id = $item->item_id;
        $this->item_name = $item->item_name;
        $this->item_description = $item->description;
        $this->item_quantity = $item->quantity;
        $this->data_image = 'tcgc-items/'.$item->item_img;
    }

    public function editItem(){

        $this->validate([
            'item_name' => 'required',
            'item_quantity' => 'required',
        ]);

        $filepath = public_path('/images/tcgc-items/'.$this->data_image);
        $folderPath = public_path().'/images/tcgc-items/';

        if ($this->image != null){
            $filename = time().'.'.$this->image->getClientOriginalExtension();
            $newItem = [
                'item_name' => $this->item_name,
                'quantity' => $this->item_quantity,
                'description' => $this->item_description,
                'item_img' => $filename,
            ];
        }else{
            $newItem = [
                'item_name' => $this->item_name,
                'quantity' => $this->item_quantity,
                'description' => $this->item_description
            ];
        }

        try {
            ItemList::where('item_id', $this->item_id)->update($newItem);

            if ($this->image != null){
                
                $this->image->storeAs('tcgc-items', $filename);

                if(file_exists($filepath)){
                    unlink($filepath);
                }
            }

            session()->flash('success','Item Edited!!');
            $this->resetFields();
            $this->dispatch('hide:add-modal');
        } catch (\Exception $e){
            session()->flash('error','Something goes wrong!!');
        }
        
    }

    public function setItemStatus($id){
        $item = ItemList::where('item_id', $id)->first(['status']);

        if ($item->status == 1){
            ItemList::where('item_id', $id)->update(['status' => 0]);
        }else{
            ItemList::where('item_id', $id)->update(['status' => 1]);
        }
    }

    public function resetNamewhenAdd(){
        $this->item_name = '';
    }
}

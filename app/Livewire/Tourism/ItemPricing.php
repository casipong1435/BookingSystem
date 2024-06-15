<?php

namespace App\Livewire\Tourism;

use Livewire\Component;

use App\Models\ItemList;
use App\Models\TourismEquipmentsDescription;
use App\Models\TourismFacilitiesDescription;

use Crypt;
use Session;

class ItemPricing extends Component
{
    public $item_id;
    public $price;
    public $purpose;
    public $time = 'Daytime';
    public $price_description;
    public $aircon = 'Yes';


    //Editing variables
    public $item_current_price = '';
    public $item_current_purpose = '';
    public $item_current_time = '';
    public $item_current_price_description = '';
    public $item_current_aircon = '';

    public $item_img;
    

    public function mount($item_id){
        $this->item_id = $item_id;
    }

    public function resetFields(){
        
        $this->price = '';
        $this->purpose = '';
        $this->time = '';
        $this->price_description = '';
        $this->aircon = '';
        $this->item_current_price = '';
        $this->item_current_price_description = '';
        $this->item_current_time = '';
        $this->item_current_purpose = '';
        $this->item_current_aircon = '';
    }

    public function closeModal(){
        $this->resetFields();
    }

    public function render()
    {
        $item = ItemList::where('item_id', $this->item_id)->first(['item_type', 'item_name', 'item_img']);
        $this->item_img = $item->item_img;

        $item_type =  $item->item_type;

        $item_name = $item->item_name;

        switch ($item_type){

            case 'equipment':
                $item_data = TourismEquipmentsDescription::where('item_id', $this->item_id)->orderBy('created_at', 'desc')->get();
                Session::put('item_type', $item_type);
                break;

            case 'facility':
                $item_data = TourismFacilitiesDescription::where('item_id', $this->item_id)->orderBy('created_at', 'desc')->get();
                Session::put('item_type', $item_type);
                break;
        }
        
        return view('livewire.Tourism.item-pricing', ['item_data' => $item_data, 'item_name' => $item_name, 'item_type' => $item_type]);
    }
    
    public function addEquipmentPricing($item_name){
        $this->validate([
            'price' => 'required'
        ]);

        $values = [
            'item_id' => $this->item_id,
            'item_name' => $item_name,
            'price' => $this->price
        ];

        try{
            TourismEquipmentsDescription::create($values);
            session()->flash('success','New Price Added!');
            $this->resetFields();
            $this->dispatch('hide:addpricing-modal');
        }catch (\Exception $e){
            session()->flash('error','Something goes wrong!!');
        }

    }

    public function addFacilityPricing($item_name){
    
        $this->validate([
            'price' => 'required',
            'time' => 'required|in:Daytime,Night Time,All Time',
            'aircon' => 'required|in:Yes,No',
            'purpose' => 'required',
            'price_description' => 'required'
        ]);

        $values = [
            'item_id' => $this->item_id,
            'item_name' => $item_name,
            'purpose' => $this->purpose,
            'time' => $this->time,
            'price_description' => $this->price_description,
            'price' => $this->price,
            'aircon' => $this->aircon
        ];

        try{
            TourismFacilitiesDescription::create($values);
            session()->flash('success','New Price Added!');
            $this->resetFields();
            $this->dispatch('hide:addpricing-modal');
        }catch (\Exception $e){
            session()->flash('error','Something goes wrong!!');
        }

    }

    public function getFacilityData($id){
        $data = TourismFacilitiesDescription::where('id', $id)->first();
        $this->item_current_price = $data->price;
        $this->item_current_purpose = $data->purpose;
        $this->item_current_price_description = $data->price_description;
        $this->item_current_time = $data->time;
        $this->item_current_aircon = $data->aircon;
    }


    public function getEquipmentData($id){
        $data = TourismEquipmentsDescription::where('id', $id)->first(['price']);
        $this->item_current_price = $data->price;
    }

    public function editEquipmentPricing($id){
        $this->validate([
            'item_current_price' => 'required'
        ]);

        try{
            TourismEquipmentsDescription::where('id', $id)->update(['price' => $this->item_current_price]);
            session()->flash('success','Price Updated!');
            $this->dispatch('hide:editpricing-modal', id: $id);
            $this->resetFields();
        }catch(\Exception $e){
            session()->flash('error','Something went wrong!');
        }
    }

    public function editFacilityPricing($id){
        
        $this->validate([
            'item_current_price' => 'required',
            'item_current_time' => 'required',
            'item_current_price_description' => 'required',
            'item_current_aircon' => 'required',
        ]);

        $values = [
            'purpose' => $this->item_current_purpose,
            'time' => $this->item_current_time,
            'price_description' => $this->item_current_price_description,
            'price' => $this->item_current_price,
            'aircon' => $this->item_current_aircon,
        ];

        try{
            TourismFacilitiesDescription::where('id', $id)->update($values);
            session()->flash('success','Price Updated!');
            $this->dispatch('hide:editpricing-modal', id: $id);
            $this->resetFields();
        }catch(\Exception $e){
            session()->flash('error','Something went wrong!');
        }
    }


    public function deleteEquipmentPricing($id){
        
        try{
            TourismEquipmentsDescription::where('id', $id)->delete();
            session()->flash('success','Price Deleted!');
        }catch(\Exception $e){
            session()->flash('error','Something went wrong!');
        }
    }


    public function deleteFacilityPricing($id){
        try{
            TourismFacilitiesDescription::where('id', $id)->delete();
            session()->flash('success','Price Deleted!');
        }catch(\Exception $e){
            session()->flash('error','Something went wrong!');
        }
    }

    
}

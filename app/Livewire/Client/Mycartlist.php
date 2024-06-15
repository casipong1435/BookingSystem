<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\MyCart;
use App\Models\ItemList;
use App\Models\Booking;

class Mycartlist extends Component
{
    public $username;
    public $item_name;
    public $item_id = '';
    public $price_id;
    public $client_item_type;
    public $quantity = 1;
    public $max_quantity;

    //Making Reservation
    public $purpose;
    public $start_date;
    public $end_date;


    public function mount(){
        $this->username = auth()->user()->username;
    }

    public function resetField(){
        $this->purpose = '';
        $this->start_date = '';
        $this->end_date = '';
    }

    public function CloseModal(){
        $this->resetField();
    }

    public function render()
    {
        $mycart_equipment = MyCart::join('tourism_equipments_descriptions', 'my_carts.price_id', '=', 'tourism_equipments_descriptions.id')
                                    ->where('username', $this->username)
                                    ->where('item_type', 'equipment')->get();
                                    
        $mycart_facility = MyCart::join('tourism_facilities_descriptions', 'my_carts.price_id', '=', 'tourism_facilities_descriptions.id')
                                    ->where('username', $this->username)
                                    ->where('item_type', 'facility')->get();
                                    

        return view('livewire.client.mycartlist', ['mycart_equipment' => $mycart_equipment, 'mycart_facility' => $mycart_facility]);
    }

    public function getItemName($item_id, $price_id){

        $item = ItemList::where('item_id', $item_id)->first(['item_name', 'item_type', 'quantity']);

        $this->price_id = $price_id;
        $this->client_item_type = $item->item_type;
        $this->item_name = $item->item_name;
        $this->max_quantity = $item->quantity;
        $this->item_id = $item_id;
    }

    public function BookNow(){

        $this->validate([
            'purpose' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'quantity' => 'required'
        ]);

        try{

            $isBooked = Booking::where('start_date', $this->start_date)
                                ->where('end_date', $this->end_date)
                                ->where('price_id', $this->price_id)
                                ->where('item_type', $this->client_item_type)
                                ->whereIn('status', [0,1])
                                ->where('username', $this->username)->first();
            if ($isBooked){
                session()->flash('fail','You already made a booking for this item!');
            }else{

                $values = [
                    'username' => $this->username,
                    'item_id' => $this->item_id,
                    'price_id' => $this->price_id,
                    'purpose' => $this->purpose,
                    'start_date' => $this->start_date,
                    'item_type' => $this->client_item_type,
                    'status' => 0,
                    'end_date' => $this->end_date,
                    'quantity' => $this->quantity
                ];

                

                Booking::create($values);

                MyCart::where('item_type', $this->client_item_type)
                                ->where('price_id', $this->price_id)
                                ->where('username', $this->username)->delete();
                
                $this->dispatch('hide:book-modal');
                session()->flash('success','Booked Successfully!');
                $this->CloseModal();
            }

        }catch(\Exception $e){
            session()->flash('error','Something went wrong!!');
            $this->dispatch('hide:book-modal');
        }
    }

    public function deleteCartItem($price_id, $item_type){
        
       try{
            MyCart::where('item_type', $item_type)
                    ->where('price_id', $price_id)
                    ->where('username', $this->username)->delete();
            session()->flash('delete','Item Deleted Successfully!');
       }catch(\Exception $e){
            session()->flash('error','Something went wrong!!');
       }
    }
}

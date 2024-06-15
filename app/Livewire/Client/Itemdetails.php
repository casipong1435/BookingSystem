<?php

namespace App\Livewire\Client;

use Livewire\Component;

use App\Models\ItemList;
use App\Models\ImageList;
use App\Models\Booking;
use App\Models\Profiles;
use App\Models\MyCart;
use App\Models\TourismEquipmentsDescription;
use App\Models\TourismRoomsDescription;
use App\Models\TourismFacilitiesDescription;
use Livewire\WithFileUploads;

use Session;
use Carbon\Carbon;

class Itemdetails extends Component
{
    use WithFileUploads;

    public $item_id;
    public $item_name;
    public $item;
    public $item_img;
    public $price_id;
    public $max_quantity;
    public $search_user;

    //Making Reservation

    public $purpose;
    public $start_date;
    public $end_date;
    public $client_item_type;
    public $quantity = 1;

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

    public function mount($item_id){
        $this->item_id = $item_id;
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
        $item = ItemList::where('item_id', $this->item_id)->first(['item_type', 'item_name', 'description', 'item_img']);
        $item_type =  $item->item_type;
        $item_description = $item->description;
        $this->item_img = $item->item_img;
        Session::put('item_type', $item_type);

        $this->item_name = $item->item_name;

        switch ($item_type){

            case 'equipment':
                $item_data = TourismEquipmentsDescription::where('item_id', $this->item_id)->whereIn('status', [0,1])->orderBy('created_at', 'desc')->get();
                break;

            case 'facility':
                $item_data = TourismFacilitiesDescription::where('item_id', $this->item_id)->whereIn('status', [0,1])->orderBy('created_at', 'desc')->get();
                break;
        }

        $this->client_item_type = $item_type;

        $more_images = ImageList::where('item_id', $this->item_id)->get();

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

        return view('livewire.client.itemdetails', ['item_data' => $item_data, 'item_name' => $this->item_name, 'item_type' => $item_type, 'item_description' => $item_description, 'client_item_type' => $this->client_item_type, 'more_images' => $more_images, 'profiles' => $profiles]);
    }

    public function getItemName($item_id, $price_id){

        $item = ItemList::where('item_id', $item_id)->first(['item_name', 'quantity']);
        $this->price_id = $price_id;
        $this->item_name = $item->item_name;
        $this->max_quantity = $item->quantity;
    }

    public function addToCart($price_id, $item_type){

        try{
            $username = auth()->user()->username;

            $added_to_cart = MyCart::where('price_id', $price_id)
                                    ->where('item_type', $item_type)
                                    ->where('username', $username)->first();
            if ($added_to_cart){

                session()->flash('error','this item is already added to your cart!!');
                
            }else{
                $values = [
                    'price_id' => $price_id,
                    'item_type' => $item_type,
                    'username' => $username,
                    'quantity' => 1
                ];
        
                MyCart::create($values);
                session()->flash('success','Item added to cart!');
            }
        }catch (\Exception $e){
            session()->flash('error','Something went wrong!!');
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

    public function BookNow(){
        if ($this->state == 0){
            $this->validate([
                'purpose' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'quantity' => 'required'
            ]);
            
            $username = auth()->user()->username;
    
            
            try{
                
                $formatStartDate = Carbon::parse($this->start_date)->format('Y-m-d');
    
                $isBooked = Booking::whereDate('start_date', $formatStartDate)
                                    ->whereIn('status', [0,1,2])
                                    ->where('username', $username)->count();
                                    
                $BookedLimit = Booking::where('start_date', '<=',$this->end_date)
                                    ->where('end_date', '>=', $this->start_date)
                                    ->whereIn('status', [1,2])
                                    ->where('item_id', $this->item_id)->count();
                if ($isBooked > 0){
                    session()->flash('fail','You already made a booking for this day!');
                }else{
                    if($BookedLimit < 1){
                        $values = [
                            'username' => $username,
                            'price_id' => $this->price_id,
                            'item_id' => $this->item_id,
                            'purpose' => $this->purpose,
                            'start_date' => $this->start_date,
                            'item_type' => $this->client_item_type,
                            'status' => 0,
                            'end_date' => $this->end_date,
                            'quantity' => $this->quantity
                        ];

        
                        Booking::create($values);
                        $this->dispatch('hide:book-modal');
                        session()->flash('success','Booked Successfully!');
                        $this->CloseModal();
                    }else{
                        session()->flash('fail', 'Someone booked for this date!');
                    }
                }
    
            }catch(\Exception $e){
                session()->flash('error','Something went wrong!!');
                $this->dispatch('hide:book-modal');
            }
        }else{
            $this->validate([
                'purpose' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'quantity' => 'required',
                'username' => 'required'
            ]);
    
            
            try{
                
                $formatStartDate = Carbon::parse($this->start_date)->format('Y-m-d');

                $isBooked = Booking::whereDate('start_date', $formatStartDate)
                                    ->whereIn('status', [0,1,2])
                                    ->where('username', $this->username)->count();
                                    
                $BookedLimit = Booking::where('start_date', '<=',$this->end_date)
                                    ->where('end_date', '>=', $this->start_date)
                                    ->whereIn('status', [1,2])
                                    ->where('item_id', $this->item_id)->count();
                
                
                if ($isBooked > 0){
                    session()->flash('fail','You already made a booking for this day!');
                }else{
                    if($BookedLimit < 1){
                        $values = [
                            'username' => $this->username,
                            'price_id' => $this->price_id,
                            'item_id' => $this->item_id,
                            'purpose' => $this->purpose,
                            'start_date' => $this->start_date,
                            'item_type' => $this->client_item_type,
                            'status' => 1,
                            'end_date' => $this->end_date,
                            'quantity' => $this->quantity,
                        ];
                        Booking::create($values);
                        
                        $this->dispatch('hide:book-modal');
                        session()->flash('success','Booked Successfully!');
                        $this->CloseModal();
                    }else{
                        session()->flash('fail', 'Someone booked for this date!');
                    }
                }
    
            }catch(\Exception $e){
                session()->flash('error','Something went wrong!!');
                $this->dispatch('hide:book-modal');
            }
        }
    }

    public function changeBooker($state){
        $this->state = $state;
    }

}

<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\User;
use App\Models\Profiles;

class MyAccount extends Component
{
    public $username;
    public $state = 0;
    public $contact_number;

    public function mount(){
        $this->username = auth()->user()->username;
        $profile = Profiles::where('username', $this->username)->first(['contact_number']);
        $this->contact_number = $profile->contact_number;
    }
    public function render()
    {
        $profile = Profiles::where('username', $this->username)->first();
        return view('livewire.client.my-account', ['profile' => $profile]);
    }

    public function updateState($state){
        $this->state = $state;
    }

    public function updateContact(){
        $this->validate([
            'contact_number' => 'required|numeric|unique:profiles,contact_number,'.$this->username,
        ]);
        
        try{
            Profiles::where('username', $this->username)->update(['contact_number' => $this->contact_number]);
            session()->flash('success', 'Contact Number Updated!');
            $this->state = 0;
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }
}

<?php

namespace App\Livewire;

use App\Models\Profiles;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

use Carbon\Carbon;

class ClientHeader extends Component
{
    use WithFileUploads;

    public $first_name;
    public $last_name;
    public $date_of_birth;
    public $email;
    public $address;
    public $zipcode;
    public $username;
    public $usertype = 0;
    public $img_id;
    public $back_id;
    public $password;
    public $contact_number;
    public $confirm_password;

    public function render()
    {
        return view('livewire.client-header');
    }

    public function Register(){

        $this->validate([
            "first_name" => 'required',
            "last_name" => 'required',
            "email" => 'required|email|unique:users,email',
            "date_of_birth" => 'required',
            "address" => 'required',
            "zipcode" => 'nullable',
            "img_id" => 'required',
            "back_id" => 'required',
            "username" => 'required|unique:users,username',
            "password" => 'min:8|required_with:confirm_password|same:confirm_password',
            "confirm_password" => 'required',
            "contact_number" => 'required|numeric|min:11|unique:profiles,contact_number',
        ]);

        try{
            $fileName1 = Str::random(10).'.'.$this->img_id->getClientOriginalExtension();
            $fileName2 = Str::random(10).'.'.$this->back_id->getClientOriginalExtension();
            
            
            $values1 = [
                'username' => $this->username,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'plain_pass' => $this->password,
                'role' => 0,
                'usertype' => $this->usertype,
                'status' => 0
            ];
            

            $values2 = [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'username' => $this->username,
                'date_of_birth' => $this->date_of_birth,
                'address' => $this->address,
                'zipcode' => $this->zipcode,
                'img_id' => $fileName1,
                'back_id' => $fileName2,
                'contact_number' => $this->contact_number,
            ];

            $query_user = User::create($values1);
            Profiles::create($values2);
            $this->img_id->storeAs('id', $fileName1);
            $this->back_id->storeAs('id', $fileName2);
            session()->flash('success', 'Registration Successful');
            $this->dispatch('hide:modal');
            Auth::login($query_user);
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }
}

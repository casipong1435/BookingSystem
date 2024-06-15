<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\User;

use Hash;

class MyProfile extends Component
{
    public $username;
    public $old_password;
    public $new_password;
    public $confirm_password;

    public $new_email;
    public $password;

    public $isPasswordUpdate = false;
    public $isEmailUpdate = false;

    public function mount(){
        $this->username = auth()->user()->username;
    }

    public function resetFields(){
        $this->old_password = '';
        $this->new_password = '';
        $this->confirm_password = '';
        $this->new_email = '';
        $this->password = '';
    }

    public function render()
    {
        $profile = User::join('profiles', 'users.username', '=', 'profiles.username')
                        ->where('users.username', $this->username)->first(['first_name', 'last_name', 'users.username', 'email']);
        return view('livewire.client.my-profile', ['profile' => $profile]);
    }

    public function UpdatePassword(){

        $this->validate([
            'old_password' => 'required|in:'.auth()->user()->plain_pass,
            'new_password' => 'min:8|required_with:confirm_password|same:confirm_password',
            "confirm_password" => 'required'
        ],
        [
            'old_password.in' => 'Incorrect Password'
        ]);


        try {

            $values = [
                'password' => Hash::make($this->new_password),
                'plain_pass' => $this->new_password
            ];

            User::where('username', $this->username)->update($values);
            session()->flash('success', 'Password Updated');
            $this->isPasswordUpdate = false;
            $this->resetFields();
            
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function UpdateEmail(){
        $this->validate([
            'password' => 'required|in:'.auth()->user()->plain_pass,
            'new_email' => 'required|email|unique:users,email',
        ],
        [
            'password.in' => 'Incorrect Password'
        ]);


        try {

            $values = [
                'email' => $this->new_email
            ];

            User::where('username', $this->username)->update($values);
            session()->flash('success', 'Email Updated');
            $this->isEmailUpdate = false;
            $this->resetFields();
            
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function CancelUpdate(){
        $this->resetFields();
        $this->dispatch('close-form');
        $this->isPasswordUpdate = false;
        $this->isEmailUpdate = false;
    }

    public function clickPasswordUpdate(){
        $this->isPasswordUpdate = true;
        $this->isEmailUpdate = false;
    }

    public function clickEmailUpdate(){
        $this->isEmailUpdate = true;
        $this->isPasswordUpdate = false;
    }
}

<?php

namespace App\Livewire\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

use Livewire\Component;

class Contact extends Component
{

    public $email;
    public $name;
    public $subject;
    public $description;
    

    public function render()
    {
        return view('livewire.client.contact');
    }

    public function resetField(){
        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->description = '';
    }

    public function SendMessage(){
        $this->validate([
            'email' => 'required',
            'name' => 'required',
            'subject' => 'required',
            'description' => 'required',
        ]);

        try{
            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
                'description' => $this->description
            ];

            Mail::to('tangubcitybookingsystem@gmail.com')->send(new ContactUs($data));

            session()->flash('success', 'Message Sent!');
            $this->resetField();
        }catch(\Exception $e){
            session()->flash('error', 'Message Sending Fail!');
        }
    }
}

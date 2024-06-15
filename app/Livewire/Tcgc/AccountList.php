<?php

namespace App\Livewire\Tcgc;

use Livewire\Component;
use App\Models\User;
use App\Models\Profiles;
use App\Models\Booking;
use App\Models\tcgcBooking;
use App\Mail\EmailNotification;

use Illuminate\Support\Facades\Mail;

class AccountList extends Component
{
    public $search_data = '';
    public $state = 0;
    public $username = '';
    public $name = '';
    public $address = '';
    public $new_userrole = 2;

    public function render()
    {
        $approved_users = User::join('profiles', 'users.username', '=', 'profiles.username')
                                ->where(function($query){
                                    $query->search('users.username', $this->search_data)
                                    ->search('profiles.first_name', $this->search_data)
                                    ->search('profiles.last_name', $this->search_data)
                                    ->search('profiles.address', $this->search_data);
                                })
                                ->where('usertype', 2)
                                ->where('status', 1)->get(['first_name', 'last_name', 'address', 'users.username',  'users.id']);

        $pending_users = User::join('profiles', 'users.username', '=', 'profiles.username')
                                ->where(function($query){
                                    $query->search('users.username', $this->search_data)
                                    ->search('profiles.first_name', $this->search_data)
                                    ->search('profiles.last_name', $this->search_data)
                                    ->search('profiles.address', $this->search_data);
                                })
                                ->where('usertype', 1)
                                ->where('status', 0)->get(['first_name', 'last_name', 'address', 'users.username', 'img_id','back_id', 'users.id', 'email', 'contact_number', 'zipcode', 'date_of_birth']);

        $banned_users = User::join('profiles', 'users.username', '=', 'profiles.username')
                                ->where(function($query){
                                    $query->search('users.username', $this->search_data)
                                    ->search('profiles.first_name', $this->search_data)
                                    ->search('profiles.last_name', $this->search_data)
                                    ->search('profiles.address', $this->search_data);
                                })
                                ->where('usertype', 3)
                                ->where('status', 1)->get(['first_name', 'last_name', 'address', 'users.username', 'users.id']);

        $official_users = User::join('profiles', 'users.username', '=', 'profiles.username')
                                ->where(function($query){
                                    $query->search('users.username', $this->search_data)
                                    ->search('profiles.first_name', $this->search_data)
                                    ->search('profiles.last_name', $this->search_data)
                                    ->search('profiles.address', $this->search_data);
                                })
                                ->whereIn('role', [2,4])
                                ->where('usertype', 1)
                                ->where('status', 1)->get(['first_name', 'last_name', 'address', 'users.username', 'role', 'users.id']);

        return view('livewire.tcgc.account-list', 
            [
                'approved_users' => $approved_users,
                'pending_users' => $pending_users,
                'banned_users' => $banned_users,
                'official_users' => $official_users
            ]
        );
    }

    public function changeState($state){
        $this->state = $state;
    }

    public function sendEmail($recipient, $name, $description){
        $email = new EmailNotification($name, $description);
        Mail::to($recipient)->send($email);
    }

    public function updateUserType($username, $status, $state){

        try{
            User::where('username', $username)->update(['usertype' => $status]);
            session()->flash('success', 'User Status Updated');

            $user_info = User::join('profiles', 'users.username', '=', 'profiles.username')
                                ->where('users.username', $username)->first(['email', 'first_name', 'last_name']);
            $name = ucfirst($user_info->first_name).' '.ucfirst($user_info->last_name);

            switch ($state){
                case 'accept':
                        $description = 'Your account have been verified as TCGC Staff. You can now make reservations to TCGC. Thank You!';
                        $this->sendEmail($user_info->email, $name, $description);
                    break;
                case 'reject':
                        $description = 'Your account have been rejected by TCGC Staff. You cannot make reservations to TCGC. Thank You!';
                        $this->sendEmail($user_info->email, $name, $description);
                    break;
                case 'ban':
                    
                        $description = 'Your account was banned by TCGC for some reason. You are now unable to make TCGC reservations.';
                        $this->sendEmail($user_info->email, $name, $description);
                    break;
                case 'unban':
                        $description = 'Your account was unbanned by TCGC for some reason. You are now able to make TCGC reservations.';
                        $this->sendEmail($user_info->email, $name, $description);
                    break;
            }
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function DeleteUser($username){
        try{
            User::where('username', $username)->delete();
            Profiles::where('username', $username)->delete();
            tcgcBooking::where('username', $username)->delete();
            Booking::where('username', $username)->delete();

            session()->flash('success', 'User Deleted');
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong!!');
        }
    }

    public function userInfo($username){
        $this->username = $username;
        $user_info = Profiles::where('username', $this->username)->first(['first_name', 'last_name', 'address']);
        $this->name = ucfirst($user_info->first_name).' '.ucfirst($user_info->last_name);
        $this->address = $user_info->address;
    }


    public function addAdmin(){
        try{
            User::where('username', $this->username)->update(['role' => $this->new_userrole]);
            $this->dispatch('make-admin');
            session()->flash("success", 'Role Updated');
        }catch(\Exception $e){
            session()->flash("error", 'Something Went Wrong!!');
        }
    }

}

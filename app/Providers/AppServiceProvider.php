<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;

use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        

        View::composer('*', function($view){
            if (Auth::check()){
                $username = Auth::user()->username;
                $userdata = User::join('profiles', 'users.username', '=', 'profiles.username')
                                     ->where('users.username', $username)->first();

                $view->with(['userdata' => $userdata]);
            }
        });

        Builder::macro('search', function($field, $string){
            return $string ? $this->orWhere($field, 'like', '%'.$string.'%') : $this;
        });
    }
}

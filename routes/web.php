<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTcgcController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TourismController;
use App\Http\Controllers\TcgcController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', function () {
    Session::forget('item_type');
    return view('client.index');
})->name('index');

Route::get('/about', function () {
    Session::forget('item_type');
    return view('client.about');
})->name('about');

Route::get('/contact', function () {
    Session::forget('item_type');
    return view('client.contact');
})->name('contact');

Route::get('/client-city-equipment', function () {
    Session::forget('item_type');
    Session::forget('tcgc-equipment');
    Session::put('city-equipment', 'city-equipment');
    return view('client.city-equipment');
})->name('client-city-equipment');

Route::get('/client-tcgc-equipment', function () {
    Session::forget('item_type');
    Session::forget('city-equipment');
    Session::put('tcgc-equipment', 'tcgc-equipment');
    return view('client.tcgc-equipment');
})->name('client-tcgc-equipment');

Route::get('/client-city-facilities', function () {
    Session::forget('item_type');
    Session::forget('tcgc-facilities');
    Session::put('city-facilities', 'city-facilities');
    return view('client.city-facility');
})->name('client-city-facilities');

Route::get('/client-tcgc-facilities', function () {
    Session::forget('item_type');
    Session::forget('city-facilities');
    Session::put('tcgc-facilities', 'tcgc-facilities');
    return view('client.tcgc-facility');
})->name('client-tcgc-facilities');

Route::get('/current-reservation/{item_id}', function ($item_id) {
    Session::forget('item_type');
    $decrypted_item_id = Crypt::decrypt($item_id);
    return view('client.check-reservation', ['item_id' => $decrypted_item_id]);
})->name('checkreservation');

Route::controller(ClientController::class)->group(function(){
    Route::get('/item-details/{item_id}', 'itemdetails')->name('itemdetails');
    Route::get('/more-images/{item_id}', 'images')->name('clientmoreimages');
});

Route::middleware(['auth', 'user-role:admin-tourism'])->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin-tourism-home', 'home')->name('admintourismhome');
        Route::get('/admin-tourism-reservation', 'reservation')->name('admintourismreservation');
        Route::get('/admin-tourism-history', 'history')->name('admintourismhistory');
        Route::get('/admin-tourism-facilities', 'facilities')->name('admintourismfacilities');
        Route::get('/admin-tourism-equipments', 'equipments')->name('admintourismequipments');
        Route::get('/admin-price/{item_id}', 'itempricing')->name('adminitempricing');
        Route::get('/admin-tourism-reservation-details/{id}', 'ReservationDetails')->name('adminreservationdetails');
        Route::get('/admin-tourism-history-details/{item_id}', 'HistoryDetails')->name('adminhistorydetails');
        Route::get('/admin-tourism-accounts', 'accounts')->name('adminaccounts');
        Route::get('/admin-tourism-reports/{from}/{to}', 'generateReport')->name('admintourismreports');
        Route::get('/admin-tourism-images/{item_id}', 'images')->name('admintourismimages');
    });
});

Route::middleware(['auth', 'user-role:admin-tcgc'])->group(function(){
    Route::controller(AdminTcgcController::class)->group(function(){
        Route::get('/admin-tcgc-home', 'home')->name('admintcgchome');
        Route::get('/admin-tcgc-reservation', 'reservation')->name('admintcgcreservation');
        Route::get('/admin-tcgc-history', 'history')->name('admintcgchistory');
        Route::get('/admin-tcgc-facilities', 'facilities')->name('admintcgcfacilities');
        Route::get('/admin-tcgc-equipments', 'equipments')->name('admintcgcequipments');
        Route::get('/admin-tcgc-reservation-details/{id}', 'ReservationDetails')->name('admintcgcreservationdetails');
        Route::get('/admin-tcgc-history-details/{item_id}', 'HistoryDetails')->name('admintcgchistorydetails');
        Route::get('/admin-tcgc-accounts', 'accounts')->name('admintcgcaccounts');
        Route::get('/admin-tcgc-images/{item_id}', 'images')->name('admintcgcimages');
    });
});

Route::middleware(['auth', 'user-role:tourism'])->group(function(){
    Route::controller(TourismController::class)->group(function(){
        Route::get('/tourism-home', 'home')->name('tourismhome');
        Route::get('/tourism-reservation', 'reservation')->name('tourismreservation');
        Route::get('/tourism-history', 'history')->name('tourismhistory');
        Route::get('/tourism-facilities', 'facilities')->name('tourismfacilities');
        Route::get('/tourism-equipments', 'equipments')->name('tourismequipments');
        Route::get('/tourism-price/{item_id}', 'itempricing')->name('itempricing');
        Route::get('/tourism-reservation-details/{id}', 'ReservationDetails')->name('reservationdetails');
        Route::get('/tourism-history-details/{item_id}', 'HistoryDetails')->name('historydetails');
        Route::get('/tourism-accounts', 'accounts')->name('accounts');
        Route::get('/tourism-reports/{from}/{to}', 'generateReport')->name('tourismreports');
        Route::get('/tourism-images/{item_id}', 'images')->name('tourismimages');
    });
});

Route::middleware(['auth', 'user-role:tcgc'])->group(function(){
    Route::controller(TcgcController::class)->group(function(){
        Route::get('/tcgc-home', 'home')->name('tcgchome');
        Route::get('/tcgc-reservation', 'reservation')->name('tcgcreservation');
        Route::get('/tcgc-history', 'history')->name('tcgchistory');
        Route::get('/tcgc-facilities', 'facilities')->name('tcgcfacilities');
        Route::get('/tcgc-equipments', 'equipments')->name('tcgcequipments');
        Route::get('/tcgc-reservation-details/{id}', 'ReservationDetails')->name('stafftcgcreservationdetails');
        Route::get('/tcgc-history-details/{item_id}', 'HistoryDetails')->name('tcgchistorydetails');
        Route::get('/tcgc-accounts', 'accounts')->name('tcgcaccounts');
        Route::get('/tcgc-images/{item_id}', 'images')->name('tcgcimages');
    });
});

Route::group(['middleware' => ['auth']], function(){
    Route::controller(ClientController::class)->group(function(){
        Route::get('/my-cart/{username}', 'mycart')->name('mycart');
        Route::get('/my-reservation/{username}', 'myreservation')->name('myreservation');
        Route::get('/reservation-proof/{id}/{item_type}', 'download')->name('download');
    });

    Route::get('/my-profile', function(){
        Session::forget('item_type');
        return view('client.my-profile');
    })->name('myprofile');

    Route::get('/my-account', function(){
        Session::forget('item_type');
        return view('client.my-account');
    })->name('myaccount');

});






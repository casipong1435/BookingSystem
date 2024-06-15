@extends('client.dashboard')

@section('page-title', 'My Account')

@section('dashboard-content')
    <div class="col-md-12 px-4 py-3">
        <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
    </div>

    <h3 class="text-center">{{ Route::currentRouteName() == 'myaccount' ? 'My Profile':'My Account' }}</h3>
    <div class="d-flex justify-content-center m-2">
        <div class="mt-2">
            <a href="{{ route('myaccount') }}" class="text-decoration-none p-2 mx-1 item-list {{ Route::currentRouteName() == 'myaccount' ? 'active':'' }}">Profile</a>
            <a href="{{ route('myprofile') }}" class="text-decoration-none p-2 mx-1 item-list {{ Route::currentRouteName() == 'myprofile' ? 'active':'' }}">Account</a>
        </div>
    </div>
    <hr>

    <div class="col-md-12 p-4">
        <div class="row">
            @yield('profile-content')
        </div>
    </div>
@endsection
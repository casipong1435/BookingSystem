@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">

        <div id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-3 fs-6 fw-bold text-white text-uppercase">
                Tangub City Booking
            </div>
        
            <div class="list-group list-group-flush">
                    <a href="{{ route('tcgchome') }}" wire:navigate class="list-group-item list-group-item-action {{ Route::currentRouteName() == 'tcgchome' ? 'current fw-bold' : ' '  }}">
                        <i class="bi bi-house me-2"></i>Home
                    </a>
                    <a href="{{route("tcgcequipments")}}" wire:navigate class="list-group-item list-group-item-action {{ Route::currentRouteName() == 'tcgcequipments' ? 'current fw-bold' : ' '  }}">
                        <i class="bi bi-truck me-2"></i>Equipments & Others
                    </a>
                    <a href="{{route("tcgcfacilities")}}" wire:navigate class="list-group-item list-group-item-action {{ Route::currentRouteName() == 'tcgcfacilities' ? 'current fw-bold' : ' '  }}">
                        <i class="bi bi-person-workspace me-2"></i>Facilities
                    </a>
                    <a href="{{route("tcgcaccounts")}}" wire:navigate class="list-group-item list-group-item-action {{ Route::currentRouteName() == 'tcgcaccounts' ? 'current fw-bold' : ' '  }}">
                        <i class="bi bi-person me-2"></i>Accounts
                    </a>
                    <a href="{{route("tcgcreservation")}}" wire:navigate class="list-group-item list-group-item-action {{ Route::currentRouteName() == 'tcgcreservation' || session()->get('reservation') == true ? 'current fw-bold' : ' '  }}">
                        <i class="bi bi-bookmark me-2"></i>Reservation
                    </a>
                    <a href="{{route("tcgchistory")}}" wire:navigate class="list-group-item list-group-item-action {{ Route::currentRouteName() == 'tcgchistory' || session()->get('history') == true ? 'current fw-bold' : ' '  }}">
                        <i class="bi bi-clock-history me-2"></i>History
                    </a>
            </div>
        </div>
    
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg py-2 px-4 shadow" id="navbar-top">
                <div class="d-flex align-items-center text-white">
                    <i class="bi bi-text-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-4 m-0">@yield('page-title')</h2>
                </div>
        
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item-dropdown">
                            <a href="#" class="nav-link dropdown-toggle fw-bold text-white fw-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-2"></i>{{ ucfirst($userdata->first_name).' '.ucfirst($userdata->last_name) }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a href="{{ route('index') }}" class="dropdown-item">Client Portal</a></li>
                                <li><a href="{{ route('myprofile') }}" class="dropdown-item">Account Details</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" id="submit-logout">
                                        @csrf
                                        <input type="submit" class="dropdown-item border-0 text-dark" value="Logout">
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-center align-items-center rounded">
                        @yield('dashboard-content')
                    </div>
                </div>
            </div>
        
            <div class="container-fluid py-2">
                <div class="text-center footer-text">
                    <div><b>Copyright © 2023 </b><a href="#" class="footlink">Tangub City Booking</a> | All Rights Reserved</div>
                </div>
            </div>
        
        </div>
    </div>
@endsection
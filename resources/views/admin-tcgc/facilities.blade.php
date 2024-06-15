@extends('admin-tcgc.dashboard')

@section('page-title', 'Our Facilities')

@section('dashboard-content')
<div class="container">
    <div class="row mt-3">
        @livewire('tcgc.tcgcfacilities')
    </div>
</div>
@endsection
@extends('admin-tourism.dashboard')

@section('page-title', 'City Admin Dashboard')

@section('dashboard-content')
<div class="container">
    <div class="row">
        @livewire('tourism.tourism-home')
    </div>
</div>
@endsection
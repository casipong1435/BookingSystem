@extends('admin-tcgc.dashboard')

@section('page-title', 'Our Rooms')

@section('dashboard-content')
<div class="container">
    <div class="row">
      @livewire('tcgc.tcgcrooms')
    </div>
</div>
@endsection
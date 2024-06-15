@extends('staff-tcgc.dashboard')

@section('page-title', 'Profile')

@section('dashboard-content')
<div class="container">
  <div class="row">
    @livewire('client.my-profile')
  </div>
</div>
@endsection
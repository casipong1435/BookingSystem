@extends('client.dashboard')

@section('page-title', 'Current Reservations')

@section('dashboard-content')
  @livewire('client.check-reservation', ['item_id' => $item_id])
@endsection
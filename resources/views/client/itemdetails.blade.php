@extends('client.dashboard')

@section('page-title', 'Item Details')

@section('dashboard-content')
  @livewire('client.itemdetails', ['item_id' => $item_id])
@endsection
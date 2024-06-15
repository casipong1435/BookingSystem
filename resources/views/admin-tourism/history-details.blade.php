@extends('admin-tourism.dashboard')

@section('page-title', 'History Details')

@section('dashboard-content')
<div class="container">
  <div class="row">
      @livewire('tourism.tourism-history-details', ['item_id' => $booking_item_id])
  </div>
</div>
@endsection
@extends('staff-tcgc.dashboard')

@section('page-title', 'History Details')

@section('dashboard-content')
<div class="container">
  <div class="row">
    @livewire('tcgc.tcgc-history-details', ['item_id' => $booking_item_id])
  </div>
</div>
@endsection
@extends('staff-tourism.dashboard')

@section('page-title', 'Accounts')

@section('dashboard-content')
<div class="container">
    <div class="row">
      @livewire('tourism.account-list')
    </div>
</div>
@endsection
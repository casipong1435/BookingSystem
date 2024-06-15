@extends('admin-tcgc.dashboard')

@section('page-title', 'Accounts')

@section('dashboard-content')
<div class="container">
    <div class="row">
      @livewire('tcgc.account-list')
    </div>
</div>
@endsection
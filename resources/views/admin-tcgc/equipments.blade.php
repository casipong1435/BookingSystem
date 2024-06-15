@extends('admin-tcgc.dashboard')

@section('page-title', 'Our Equipments')

@section('dashboard-content')
<div class="container">
    <div class="row">
      @livewire('tcgc.tcgcequipments')
    </div>
</div>
@endsection
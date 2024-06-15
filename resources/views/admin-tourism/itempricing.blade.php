@extends('admin-tourism.dashboard')

@section('page-title', 'Pricing')

@section('dashboard-content')
<div class="container">
    <div class="row">
        @livewire('tourism.item-pricing',['item_id' => $encrypted_id])
    </div>
</div>
@endsection
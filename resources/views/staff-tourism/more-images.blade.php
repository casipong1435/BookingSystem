@extends('staff-tourism.dashboard')

@section('page-title', 'More Images')

@section('dashboard-content')
<div class="container">
    <div class="row">
        @livewire('tourism.more-images', ['item_id' => $decrypted_id])
    </div>
</div>
@endsection
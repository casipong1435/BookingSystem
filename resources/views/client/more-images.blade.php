@extends('client.dashboard')

@section('page-title', 'Tangub Booking Website')

@section('dashboard-content')
	@livewire('client.more-images', ['item_id' => $decrypted_id])
@endsection
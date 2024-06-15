@extends('client.dashboard')

@section('page-title', 'Tangub Booking Website - Contact Us')

@section('dashboard-content')
  @livewire('client.contact')
  @include('partials.notification')
@endsection
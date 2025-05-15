@extends('backend.inc.layout')

@section('title', 'Manage Rentals')

@section('content')
    @include('backend.rentals.pageTitle')
    @include('backend.rentals.rentalList')
    @include('backend.rentals.rentalInsert')
@endsection
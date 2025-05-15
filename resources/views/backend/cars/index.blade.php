@extends('backend.inc.layout')

@section('title', 'Manage Cars')

@section('content')
    @include('backend.cars.pageTitle')
    @include('backend.cars.carList')
@endsection
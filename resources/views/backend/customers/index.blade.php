@extends('backend.inc.layout')

@section('title', 'Manage Customers')

@section('content')
    @include('backend.customers.pageTitle')
    @include('backend.customers.customerInsert')
    @include('backend.customers.customerList')
    @include('backend.customers.customerDetails')
    @include('backend.customers.customerEdit')
@endsection
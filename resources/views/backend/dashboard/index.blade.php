@extends('backend.inc.layout')
@section('title', 'Dashboard')
@section('content')
    @include('backend.dashboard.pageTitle')
    @include('backend.dashboard.adminList')
@endsection

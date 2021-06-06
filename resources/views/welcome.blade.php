@extends('layouts.app')

@section('content')
    <div class="content">
        <img src="img\logo.png" alt="Laravel Delivery App Main Logo">
        <div class="title m-b-md">
            StayStrong Delivery App
        </div>
            <a class="btn btn-success btn-lg" href="{{ route('customers.createcustomer') }}"> Create New Customer </a>
            <a class="btn btn-success btn-lg" href="{{ route('packages.order.create') }}"> Book New Delivery </a>
        @auth
            <a class="btn btn-info btn-lg" href="{{ route('customers.index') }}"> To All Customers </a>
            <a class="btn btn-info btn-lg" href="/packages"> To All Packages </a>
        @endauth
    </div>
@endsection

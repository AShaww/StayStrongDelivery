@extends('layouts.app')

@section('content')
<div class="content">
    <img src="img\ParcelLogo.jpg" alt="Laravel Delivery App">
        <div class="title m-b-md">
            StayStrong Delivery App
        </div>
    <a class="package-details" href="{{ route('customers.createcustomer') }}"> Create a Customer </a>
    <a class="package-details" href="{{ route('packages.createorder') }}">Book Customer Delivery</a>
</div>                       
@endsection
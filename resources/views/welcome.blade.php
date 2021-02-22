@extends('layouts.app')

@section('content')
<div class="content">
    <img src="img\newLogo.png" alt="StayStrong Logo">
        <div class="title m-b-md">
            StayStrong Delivery!
        </div>
    <a href="{{ route('packages.create') }}">Book a Delivery</a>
</div>                       
@endsection
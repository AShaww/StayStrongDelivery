@extends('layouts.layout')
@section('content')

<div class="wrapper pizza-details">
    <h1 class="name">Package details for: {{ $package->name }}</h1>
    <p class="type">Type - {{ $package->type }}</p>
    <p class="length">Length - {{ $package->length }}</p>  
    <p class="length">Width - {{ $package->width }}</p>
    <p class="length">Height - {{ $package->height }}</p>
    <p class="length">Weight - {{ $package->weight }}</p>

    <form action="/packages/{{ $package->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Place Booking</button>
    </form>
</div>
@endsection             

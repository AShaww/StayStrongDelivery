@extends('layouts.app')
@section('content')

<div class="wrapper pizza-details">
<h1 class="title">Customer Order Details</h1>
    <h2 class="name">Package details for: {{ $package->name }}</h2>
    <p class="created_at">Type - {{ $package->created_at }}</p>
    <p class="type">Type - {{ $package->type }}</p>
    <p class="length">Length - {{ $package->length }}</p>  
    <p class="length">Width - {{ $package->width }}</p>
    <p class="length">Height - {{ $package->height }}</p>
    <p class="length">Weight - {{ $package->weight }}</p>

    <form action="{{ route('packages.destroy', $package->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Order has been delivered</button>
    </form>
</div>
<a href="/packages" class="back"> <-- Back to all Packages</a>
@endsection             

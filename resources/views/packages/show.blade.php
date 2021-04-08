<?php
use App\Models\Customer;
?>

@extends('layouts.app')
@section('content')

<div class="wrapper package-details">
<h1 class="title">Customer Order Details - <a href="/packages/edit/{{ $package->id }}">Edit</a></h1>
    <h2 class="name">Package details for: {{ Customer::find($package->customerId)->fullname ?? 'Unable to get name' }}</h2>
    <p class="status">Latest Status: {{ $package->packagestatus }}</p>
    <p class="created_at">Created on/at: {{ $package->created_at }}</p>
        <p class="type">Type - {{ $package->type }}</p>
    <p class="length">Length - {{ $package->length }}</p>  
    <p class="length">Width - {{ $package->width }}</p>
    <p class="length">Height - {{ $package->height }}</p>
    <p class="length">Weight - {{ $package->weight }}</p>

    Log:
    <ul>
    @foreach($package->statuses() as $status)
        <li> {{ $status->status }} - {{ $status->created_at->format('H:m:s d/m/Y') }} </li>
    @endforeach
    </ul>
    
    @if($package->deleted_at === null)
    <form action="{{ route('packages.delete', $package->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
    @endif
    <form action="/packages/{{ $package->id }}" method="post">
    @csrf
    <input type="hidden" name="packageId" value="{{ $package->id }}">
        <select name="deliveryStatus" id="deliveryStatus" style="padding: 5px;">
            <option value="delivered" selected>Delivered</option>
            <option value="missing">Missing</option>
            <option value="received">Received</option>
            <option value="returned">Returned</option>
        </select>
        <button>Change status</button>
    </form>

</div>
<a href="/packages" class="back"> <-- Back to all Packages</a>
@endsection             

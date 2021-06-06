<?php

use App\Models\Customer;

?>

@extends('layouts.app')
@section('content')

<div class="wrapper create-package">
    <h1 class="title">Edit Package Details</h1>
    <form action="/packages/edit" method="POST">
        @csrf
        <input type="hidden" value="{{ $package->id }}" name="packageid">

        Customer:
        <select name="customerId" id="customerId">

        @foreach(Customer::all() as $customer)
            @if(Customer::find($package->customerId))
                <option value="{{ $customer->id }}" selected>{{ $customer->fullname }}</option>
            @else
        <option value="{{ $customer->id }}">{{ $customer->fullname }}</option>
            @endif
        @endforeach

        </select>

        <label for="fName">Package Type</label>
        <select name="type" id="">
            @if($package->type === 'letter')
                <option value="letter" selected>Letter</option>
                <option value="parcel">Parcel</option>
            @else
                <option value="parcel" selected>Parcel</option>
                <option value="letter">Letter</option>
            @endif
        </select>
        
        <label for="lName">Package Length</label>
        <input type="number" value="{{ $package->length }}" name="length">
        
        <label for="number">Package width</label>
        <input type="number"value="{{ $package->width }}"  name="width">

        <label for="email">Package height</label>
        <input type="number"value="{{ $package->height }}" name="height"> 

        <label for="fAddress">Package weight</label>
        <input type="number" value="{{ $package->weight }}" name="weight">
        <br>
        <input type="submit" value="Save Package Changes">
 
</form>  
</div> 
@endsection             

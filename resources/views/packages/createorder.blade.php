@extends('layouts.app')
@section('content')

<div class="wrapper create-package">
    <h1 class="title">Create a New Package</h1>
    <form action="/packages" method="POST">
        @csrf
        
        @if($customers->count() === 0)
            Please add a customer first
        @else
            <select name="customerId" id="customerId">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" selected>{{ $customer->fullname }}</option>
                @endforeach
            </select>
        @endif
        
        <label for="type">Choose package type:</label>
        <select name="type" id="type">
            <option value="letter" selected>Letter</option>
            <option value="parcel">Parcel</option>
        </select>

        <label for="length">The Length:</label>
        <input type="number" id="length" name="length" class="target">
        
        <label for="width">The Width:</label>
        <input type="number" step="0.1" id="width" name="width" class="target">

        <label for="height">The Height:</label>
        <input type="number" step="0.1" id="height" name="height" class="target"> 

        <label for="weight">The Weight:</label>
        <input type="number"  id="weight" name="weight" class="target">
        <input type="submit" value="Order Package">
 
</form>  
</div> 
@endsection             

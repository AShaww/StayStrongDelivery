@extends('layouts.app')
@section('content')

<div class="wrapper create-package">
    <h1 class="title">Edit Customer Details</h1>
    <form action="/customers" method="POST">
        @csrf
        <input type="hidden" value="{{$customer->id}}" name="id">

        <label for="fName">Customer First Name</label>
        <input type="text" value="{{ $customer->fName }}" id="fName" name="fName">
        
        <label for="lName">Customer Last Name</label>
        <input type="text" value="{{ $customer->lName }}" id="lName" name="lName">
        
        <label for="number">Customer Number</label>
        <input type="number"value="{{ $customer->number }}" id="number" name="number">

        <label for="email">Customer Email</label>
        <input type="text"value="{{ $customer->email }}" id="email" name="email"> 

        <label for="fAddress">First Line Address</label>
        <input type="text" value="{{ $customer->fAddress }}" id="fAddress" name="fAddress">
        
        <label for="lAddress">Second Line Address</label>
        <input type="text" value="{{ $customer->lAddress }}" id="lAddress" name="lAddress">
        
        <label for="postcode">Customer Postcode</label>
        <input type="text" value="{{ $customer->postcode }}" id="postcode" name="postcode">
        
        <input type="submit" value="Save Customer Changes">
 
</form>  
</div> 
@endsection             

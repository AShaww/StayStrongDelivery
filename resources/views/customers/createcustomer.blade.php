@extends('layouts.app')
@section('content')

<div class="wrapper create-package">
    <h1 class="title">Create a New Customer</h1>
    <form action="/customers" method="POST" >
        @csrf
        <label for="fName">Customer First Name</label>
        <input type="text" id="fName" name="fName">
        
        <label for="lName">Customer Last Name</label>
        <input type="text" id="lName" name="lName">
        
        <label for="number">Customer Phone Number</label>
        <input type="number" id="number" name="number">

        <label for="email">Customer Email</label>
        <input type="text" id="email" name="email"> 

        <label for="fAddress">First Line Address</label>
        <input type="text" id="fAddress" name="fAddress">
        
        <label for="lAddress">Second Line Address</label>
        <input type="text" id="lAddress" name="lAddress">
        
        <label for="postcode">Customer Postcode</label>
        <input type="text" id="postcode" name="postcode">
        
        <input type="submit" value="Create Customer">
 
</form>  
</div> 
@endsection             

@extends('layouts.layout')
@section('content')

<div class="wrapper create-pizza"> 
    <h1 class="title">Create a New Package</h1>
    <form action="/packages" method="POST">
        @csrf
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name">

        <label for="type">Choose package type:</label>

        <select name="type" id="type">
            <option value="letter">Letter</option>
            <option value="parcel">Parcel</option>
        </select>
        <label for="length">The Length:</label>
        <input type="text" id="length" name="length">
        

        

        <label for="width">The Width:</label>
        <input type="text" id="width" name="width">

        <label for="height">The Height:</label>
        <input type="text" id="height" name="height"> 

        <label for="weight">The Weight:</label>
        <input type="text" id="weight" name="weight">

        <input type="submit" value="Order Package">
</form>
</div> 
@endsection             

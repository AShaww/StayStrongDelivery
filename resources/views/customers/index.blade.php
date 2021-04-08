@extends('layouts.app')
@section('content')

<div class="wrapper package-index">
        <h1>Customer Details</h1>
        @foreach($customers as $customer)
            <div class="package-item">
            <h4><a href="/customers/{{ $customer->id }}">[Full Name: {{ $customer->fName }} {{ $customer->lName }}] [First Line Add{{ $customer->fAddress }}]</a></h4>            
            </div>
         @endforeach  
       </div>
@endsection             


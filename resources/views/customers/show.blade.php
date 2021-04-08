@extends('layouts.app')
@section('content')
<div class="wrapper package-details">
<h1 class="title">Customer Order Details</h1>

    <h2 class="name">Customer details for: {{ $customer->fName }}</h2>

    <!-- <label for="lName">Customer Last Name</label>
    <input type="text" value="{{ $customer->fName }}" id="lName" name="lName"> -->

    <p class="created_at">Created on/at: {{ $customer->created_at }}</p>
    <p class="fName">First Name: {{ $customer->fName }}</p>
    <p class="lName">Last Name: {{ $customer->lName }}</p>
    <p class="number">Phone Number: {{ $customer->number }}</p>
    <p class="email">Email Address: {{ $customer->email }}</p>
    <p class="fAddress">1st Line Address: {{ $customer->fAddress }}</p>
    <p class="lAddress">2nd Line Address: {{ $customer->lAddress }}</p>
    <p class="postcose">Post Code: {{ $customer->postcode }}</p>

    <form action="{{ route('customers.delete', $customer->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Delete Customer</button>
    </form>
    
    <form action="{{ route('customers.edit', $customer->id) }}" method="GET">
     
        <button>edit Customer</button>
    </form>
</div>
<a href="/customers" class="back"> <-- Back to all Customers</a>
@endsection             

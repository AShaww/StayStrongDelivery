<?php
use App\Models\Customer;
?>

@extends('layouts.app')
@section('content')

<div class="wrapper package-index">
        <h1>Deleted Orders</h1>
        <a href="/packages"> <-- Back to all Packages</a>
        @if($packages->count() === 0)
          No packages have been deleted
          
          @else
          @foreach($packages as $package)
              <div class="package-item">
              <h4><a href="/packages/{{ $package->id }}">[ID: {{ $package->id }}] [Name: {{ Customer::find($package->customerId)->fullname ?? 'Unable to get name' }}] [Type: {{ $package->type }}]  </a></h4>            
              </div>
          @endforeach  
         @endif
         
       </div>
@endsection             

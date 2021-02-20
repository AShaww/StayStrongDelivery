@extends('layouts.layout')
@section('content')

<div class="wrapper package-index">

<h1>Package Orders</h1>

   @foreach($packages as $package)
        <div>
           <h4><a href="/packages/{{ $package-id }}">{{ $package->name }}</a></h4>
        </div>
    @endforeach    
    
</div>      
@endsection             

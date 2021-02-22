@extends('layouts.app')
@section('content')

<div class="wrapper package-index">
        <h1>Package Orders</h1>
        @foreach($packages as $package)
            <div class="package-item">
               @if($package->type === 'letter')
               <img src="{{ asset('img/LetterLogo.jpg') }}" class="LetterLogo" alt="StayStrong LetterLogo" >
               @else
               <img src="{{ asset('img/Parcellogo.jpg') }}" class="ParcelLogo" alt="StayStrong ParcelLogo">
               @endif 
            <h4><a href="/packages/{{ $package->id }}">{{ $package->name }}</a></h4>            
            </div>
         @endforeach  
       </div>
@endsection             

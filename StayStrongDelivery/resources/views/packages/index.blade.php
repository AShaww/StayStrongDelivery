@extends('layouts.layout')
@section('content')
            <div class="content">
                <div class="title m-b-md">
                    Package List               
                </div>
           
           @foreach($packages as $package)
           <div>
           {{ $package->name }} - {{ $package->type }}
           </div>
          @endforeach      
@endsection             

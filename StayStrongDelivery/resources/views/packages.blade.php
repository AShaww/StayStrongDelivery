@extends('layouts.layout')
@section('content')
            <div class="content">
                <div class="title m-b-md">
                    Package List               
                </div>
                <p>{{ $name }}</p>

                @for($i = 0; $i < count($packages); $i++)
                  <p>{{ $packages[$i]['type'] }}</p>
                @endfor
            </div>
@endsection             

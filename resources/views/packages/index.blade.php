<?php

use App\Models\Customer;

?>

@extends('layouts.app')
@section('content')

    <div class="wrapper package-index">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h1>Package Orders</h1>
                </div>
                <div class="col-2">
                    <a class="btn btn-info btn-block" href="/packages/trashed">View Deleted</a>
                </div>
            </div>
        </div>
        @if($packages->count() === 0)
            No packages
        @else
            @foreach($packages as $package)
                <div class="package-item">
                    <h4>
                        <a href="/packages/{{ $package->id }}">
                            [Package ID: {{ $package->id }}]
                            [Recipient: {{ $package->recipient->fullname ?? 'Unable to get name' }}]
                            [Package Type: {{ $package->type }}]
                        </a>
                    </h4>
                </div>
            @endforeach
        @endif
    </div>
@endsection

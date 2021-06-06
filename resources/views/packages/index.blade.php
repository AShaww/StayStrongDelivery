<?php

use App\Models\Customer;

?>

@extends('layouts.app')
@section('content')

    <div class="wrapper package-index">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h1>Package Orders</h1>
                </div>
                <div class="col-4 text-right">
                    <a class="btn btn-info btn-sm mr-1" href="/packages/trashed">
                        View Deleted
                    </a>
                    <a class="btn btn-danger btn-sm" href="/">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
        @if($packages->count() === 0)
            <div class="row">
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        No Packages, <a href="{{ route('packages.order.create') }}">Add New Package</a>
                    </div>
                </div>
            </div>
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

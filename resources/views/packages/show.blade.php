<?php

use App\Models\Customer;

$statusOptions = [
    'Delivered',
    'Missing',
    'Received',
    'Returned',
    'Lost'
];

?>

@extends('layouts.app')
@section('content')

    <div class="wrapper package-details">
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <div class="h2">
                        Order Details
                    </div>
                </div>

                <div class="col-3 text-right btn-sm">
                    @if($package->deleted_at === null)
                        <form action="{{ route('packages.delete', $package->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="button" class="btn btn-info" value="Edit"
                                   onclick="window.location.href='/packages/edit/{{ $package->id }}'">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper package-details">
        <div class="row">
            <div class="col-6">
                <span class="font-weight-bold">
                    Latest Status:
                </span>

                {{ $package->packagestatus }}
            </div>

            <div class="col-6">
                <form action="/packages/{{ $package->id }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-8">
                            <div class="input-group">
                                <input type="hidden" name="packageId" value="{{ $package->id }}">
                                <select class="form-control" name="deliveryStatus" id="deliveryStatus"
                                        style="padding: 5px;">
                                    @foreach($statusOptions as $option)
                                        @if($option === $package->status)
                                            <option value="{{ $option }}" selected>{{ ucwords($option) }}</option>
                                        @else
                                            <option value="{{ $option }}"> {{ ucwords($option) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <input type="submit" class="btn btn-block btn-success text-white" value="Change">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="wrapper package-details">
        <div class="row">
            <div class="col-6">
                <label for="">Sender Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ $package->sender->fullname }}" readonly>
                </div>

                <label class="mt-1" for="">Address</label>
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ $package->sender->address }}" readonly>
                </div>
            </div>
            <div class="col-6">
                <label for="">Recipient Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ $package->recipient->fullname }}" readonly>
                </div>

                <label class="mt-1" for="">Address</label>
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ $package->recipient->address }}" readonly>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper package-details">
        <div class="row">
            <div class="col-12">
                <p class="type">Type - {{ $package->type }}</p>
                <p class="length">Length - {{ $package->length }}</p>
                <p class="length">Width - {{ $package->width }}</p>
                <p class="length">Height - {{ $package->height }}</p>
                <p class="length">Weight - {{ $package->weight }}</p>
            </div>
        </div>
    </div>

    <div class="wrapper package-details">
        <div class="row">
            <div class="col-12">
                <label for="">Package History</label>
                <table class="table table-bordered">
                    <thead>
                    <th>Status</th>
                    <th>Time</th>
                    </thead>
                    <tbody>
                    @foreach($package->statuses as $status)
                        <tr>
                            <td>{{ $status->status }}</td>
                            <td>{{ $status->created_at->format('H:m:s d/m/Y') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-6 text-left">
                    <a href="/packages"> <-- Back to all Packages</a>
                </div>
                <div class="col-6 text-right">
                    {{ $package->created_at }}
                </div>
            </div>
        </div>
    </div>
@endsection

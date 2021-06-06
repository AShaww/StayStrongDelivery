@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Admin Dashboard
                    </div>
                    <div class="card-body">

                        <div class="container ">
                            <div class="row">

                                <div class="col-3">
                                    <a class="btn btn-success btn-block" href="{{ route('customers.createcustomer') }}">
                                        New Customer
                                    </a>
                                </div>

                                <div class="col-3">
                                    <a class="btn btn-success btn-block" href="{{ route('packages.order.create') }}">
                                        Add Delivery
                                    </a>
                                </div>

                                <div class="col-3">
                                    <a class="btn btn-info btn-block" href="{{ route('customers.index') }}">
                                        Customer Index
                                    </a>
                                </div>

                                <div class="col-3">
                                    <a class="btn btn-info btn-block" href="packages">
                                        Packages Index
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
@endsection

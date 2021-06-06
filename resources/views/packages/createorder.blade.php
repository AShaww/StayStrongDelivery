@extends('layouts.app')
@section('content')

    <div class="wrapper create-package">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Create a New Package</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper create-package">
        <form action="/packages" method="POST">
            @csrf
            <div class="container">

                <div class="row ">

                    <div class="col-4">
                        <label class="font-weight-bold" for="customerId">
                            Sender
                        </label>

                        <label class="" for="customerId">
                            Choose Customer
                        </label>
                        <div class="input-group">
                            @if($customers->count() === 0)
                                Please add a customer first
                            @else
                                <select name="senderId" id="senderId" class="form-control">
                                    <option value="" selected></option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ ucwords($customer->fullname) }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>

                    <div class="col-4">
                        <label class="font-weight-bold" for="">
                            Package Details
                        </label>
                        <label for="type">Package type:</label>
                        <div class="input-group">
                            <select class="form-control" name="type" id="type">
                                <option value="letter" selected>Letter</option>
                                <option value="parcel">Parcel</option>
                            </select>
                        </div>

                        <label for="length">Package Length:</label>
                        <div class="input-group">
                            <input type="number" id="length" step="0.1" name="length" class="target form-control"
                                   min="0"
                                   max="250" value="0">
                            <div class="input-group-append">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>

                        <label for="width">Package Width:</label>
                        <div class="input-group">
                            <input type="number" step="0.1" id="width" name="width" class="form-control" min="0"
                                   max="250" value="0">
                            <div class="input-group-append">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>

                        <label for="height">Package Height:</label>
                        <div class="input-group">
                            <input type="number" step="0.1" id="height" name="height" class="form-control" min="0"
                                   max="250" value="0">
                            <div class="input-group-append">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>

                        <label for="weight">Package Weight:</label>
                        <div class="input-group">
                            <input type="number" id="weight" name="weight" class="form-control" min="0" max="1000"
                                   value="0">
                            <div class="input-group-append">
                                <span class="input-group-text">kg</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="font-weight-bold" for="">
                            Recipient
                        </label>


                        <label for="type">Name</label>
                        <div class="input-group">
                            @if($customers->count() === 0)
                                Please add a customer first
                            @else
                                <select name="recipientId" id="recipientId" class="form-control">
                                    <option value="" selected></option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ ucwords($customer->fullname) }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>


                    </div>

                </div>

                <div class="row mt-5">
                    <div class="col-3">
                        <a class="btn btn-danger btn-block" href="/packages">
                            Cancel
                        </a>
                    </div>
                    <div class="col-9">
                        <button class="btn btn-success btn-block" type="submit">
                            Order Package
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>

@endsection

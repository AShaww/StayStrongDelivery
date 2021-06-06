@extends('layouts.app')
@section('content')

    <div class="wrapper create-package">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1 class="title">Create a New Customer</h1>
                    <form action="/customers" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="fName">Customer First Name</label>
                            <input class="form-control form-control-sm" type="text" id="fName" name="fName">
                        </div>

                        <div class="form-group">
                            <label for="lName">Customer Last Name</label>
                            <input class="form-control form-control-sm" type="text" id="lName" name="lName">
                        </div>

                        <div class="form-group">
                            <label for="number">Customer Phone Number</label>
                            <input class="form-control form-control-sm" type="number" id="number" name="number">
                        </div>

                        <div class="form-group">
                            <label for="email">Customer Email</label>
                            <input class="form-control form-control-sm" type="text" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="fAddress">First Line Address</label>
                            <input class="form-control form-control-sm" type="text" id="fAddress" name="fAddress">
                        </div>

                        <div class="form-group">
                            <label for="lAddress">Second Line Address</label>
                            <input class="form-control form-control-sm" type="text" id="lAddress" name="lAddress">
                        </div>

                        <div class="form-group">
                            <label for="postcode">Customer Postcode</label>
                            <input class="form-control form-control-sm" type="text" id="postcode" name="postcode">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <a class="btn btn-danger btn-sm btn-block" href="../">Cancel</a>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-success btn-sm btn-block" type="submit">Submit</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

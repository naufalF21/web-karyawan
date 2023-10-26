@extends('layout')
@section('container')
    <div class="container">
        <div class="row gap-5">
            @include('layouts.sidebar')
            <div class="col-9">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <div>
                        <h5 class="fw-normal fw-bold mb-3">Password</h5>
                        <p class="fw-normal text-body-tertiary">To change/add a password, you must go to the <span
                                class="text-blues">reset password</span> page so we can verify your identity.</p>
                        <a href="#" class="btn btn-primary fw-normal text-white" style="width: 25%">Reset
                            Password</a>
                    </div>
                </div>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <div>
                        <h5 class="fw-normal fw-bold mt-5 mb-3">Delete your account</h5>
                        <p class="fw-normal text-body-tertiary">By deleting your account, you'll no longer be able to access
                            any of or log in to Algostudio.</p>
                        <a href="#" class="btn btn-primary fw-normal text-white" style="width: 25%">Delete Account</a>
                    </div>
                </div>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <div>
                        <h5 class="fw-normal fw-bold mt-5 mb-3">Email verification</h5>
                        <p class="fw-normal text-body-tertiary">Verify your email now</p>
                        <a href="#" class="btn btn-primary fw-normal text-white" style="width: 100%">Verify Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

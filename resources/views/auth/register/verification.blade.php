@extends('layout')
@section('content')
    <style>
        @media (max-width: 575.98px) {
            #text {
                width: 80%;
            }
        }

        @media (min-width: 768px) {
            #text {
                width: 60%;
            }
        }
    </style>
    <div class="d-flex flex-column align-items-center justify-content-center w-100" style="height: 100vh">
        <div class="d-flex flex-column text-start m-auto justify-content-center align-items-center">
            <img class="mb-4" src="/assets/img/logo-algostudio.svg" alt="logo-algostudio">
            <img class="mb-4 mt-4" height="80px" src="/assets/img/verification.svg" alt="logo-verification">
            <span class="fw-normal text-primary fs-4 fw-bold text-center">Successfully created account</span>
            <span class="fw-normal text-center mt-2 mb-4 w-60" id="text">Your request is being
                reviewed,
                please wait a
                while to
                wait
                for approval from
                admin! <br>Thank You.</span>
            <div>
                <a class="btn btn-primary w-100 py-2 px-4 text-white rounded-4 mt-4" href="{{ route('login') }}">Done</a>
            </div>
        </div>
    </div>
@endsection

@extends('layout')
@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh">
        <form action="/forgot-password/change-password" method="get"
            class="form-signin text-start w-100 m-auto justify-content-center align-items-center">
            @csrf
            <img class="mx-auto mb-5" src="/assets/img/logo-algostudio.png" alt="logo-algostudio">
            <p class="mx-auto mb-3 fw-normal fs-4 fw-bold">Enter 4 digit code</p>
            <p class="mx-auto mb-3 fw-normal">A four-digit code should have come to your email address that you indicated.
            </p>
            <p class="mx-auto mb-3 fw-normal">Not received your code? <a
                    class="link-offset-2 link-underline link-underline-opacity-0 text-primary" href="#">Resend
                    Code</a>
            </p>
            <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                <input class="m-2 py-4 text-center form-control rounded" type="text" id="first" maxlength="1" />
                <input class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" />
                <input class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" />
                <input class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" />
            </div>
            <div class="text-center mt-4">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-outline-primary w-100 py-2 rounded-4"
                            href="{{ route('reset_password') }}">Cancel</a>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary w-100 py-2 mb-2 text-white rounded-4" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

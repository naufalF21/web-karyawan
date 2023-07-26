@extends('layout')
@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh">
        <form action="/forgot-password/verification" method="get"
            class="form-signin text-center w-100 m-auto justify-content-center align-items-center">
            @csrf
            <img class="mx-auto mb-5" src="/assets/img/logo-algostudio.png" alt="logo-algostudio">
            <div class="text-start">
                <p class="mx-auto mb-3 fw-normal text-primary fs-4 fw-bold">Forgot password</p>
                <p class="mx-auto mb-3 fw-normal">Enter your email for the verification process, we will send code to your
                    email
                </p>
            </div>
            <div class="form-group input-group mt-5">
                <input class="form-control py-2 rounded-4" id="email" type="email" placeholder="Your Email" />
                <span class="input-group-text bg-primary rounded-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="22" viewBox="0 0 23 22"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.33334 4.81248C2.33334 4.30622 2.74374 3.89581 3.25 3.89581H19.75C20.2563 3.89581 20.6667 4.30622 20.6667 4.81248V17.1875C20.6667 17.6937 20.2563 18.1041 19.75 18.1041H3.25C2.74374 18.1041 2.33334 17.6937 2.33334 17.1875V4.81248ZM4.16667 5.72915V16.2708H18.8333V5.72915H4.16667Z"
                            fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.55401 4.21594C2.88348 3.83156 3.46217 3.78704 3.84655 4.1165L11.5 10.6765L19.1535 4.1165C19.5378 3.78704 20.1165 3.83156 20.446 4.21594C20.7755 4.60033 20.7309 5.17902 20.3466 5.50849L12.0966 12.5798C11.7533 12.874 11.2467 12.874 10.9034 12.5798L2.65345 5.50849C2.26906 5.17902 2.22454 4.60033 2.55401 4.21594Z"
                            fill="white" />
                    </svg>
                </span>
            </div>
            <div class="text-center mt-4">
                <div class="row">
                    <div class="col">
                        <a href="/login" class="btn btn-outline-primary w-100 py-2 rounded-4">Cancel</a>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary w-100 py-2 text-white mb-2 rounded-4" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

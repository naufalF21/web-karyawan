@extends('layout')
@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh">
        <form action="/login" method="get"
            class="form-signin text-start w-100 m-auto justify-content-center align-items-center">
            @csrf
            <p class="mx-auto mb-3 fw-normal text-primary fs-4 fw-bold">Forgot password</p>
            <p class="mx-auto mb-3 fw-normal">Set your new password to login into your account!</p>
            <div class="form-group input-group mt-5">
                <input class="form-control py-2 rounded-4" id="password" type="password" placeholder="Your Password" />
                <span class="input-group-text rounded-4 bg-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.83333 8.93748C1.83333 8.43122 2.24374 8.02081 2.75 8.02081H19.25C19.7563 8.02081 20.1667 8.43122 20.1667 8.93748V19.25C20.1667 19.7562 19.7563 20.1666 19.25 20.1666H2.75C2.24374 20.1666 1.83333 19.7562 1.83333 19.25V8.93748ZM3.66667 9.85415V18.3333H18.3333V9.85415H3.66667Z"
                            fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11 3.66665C8.69123 3.66665 6.76042 5.62103 6.76042 8.10423C6.76042 8.61049 6.35001 9.0209 5.84375 9.0209C5.33749 9.0209 4.92708 8.61049 4.92708 8.10423C4.92708 4.67424 7.6142 1.83331 11 1.83331C14.3858 1.83331 17.0729 4.67424 17.0729 8.10423C17.0729 8.61049 16.6625 9.0209 16.1562 9.0209C15.65 9.0209 15.2396 8.61049 15.2396 8.10423C15.2396 5.62103 13.3088 3.66665 11 3.66665Z"
                            fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11 12.5819C11.5063 12.5819 11.9167 12.9923 11.9167 13.4986V14.5298C11.9167 15.0361 11.5063 15.4465 11 15.4465C10.4937 15.4465 10.0833 15.0361 10.0833 14.5298V13.4986C10.0833 12.9923 10.4937 12.5819 11 12.5819Z"
                            fill="white" />
                    </svg>
                </span>
            </div>
            <div class="text-center mt-4">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-outline-primary w-100 py-2 rounded-4" href="/login">Cancel</a>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary w-100 py-2 mb-2 rounded-4 text-white" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@extends('layout')
@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh">
        <form action="/login" method="post"
            class="form-signin text-center w-100 m-auto justify-content-center align-items-center">
            @csrf
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('email') || session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('email') ?? '' }}
                    {{ session('loginError') ?? '' }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <a href="/"><img class="mx-auto mb-4" src="/assets/img/logo-algostudio.png" alt="logo-algostudio"></a>
            <p class="mx-auto mb-3 fw-normal text-body-tertiary">Login for next page</p>
            <div class="form-group input-group">
                <input class="form-control rounded-4" id="email" type="email" placeholder="Your Email" name="email"
                    value="{{ old('email') }}" required />
                <span class="input-group-text bg-primary rounded-4"
                    style="margin-left: -2.9rem; z-index: 99; border-color: #04A6FE;">
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
            <div class="form-group input-group">
                <input class="form-control py-2 rounded-4" id="password" type="password" placeholder="Your Password"
                    name="password" required />
                <span class="input-group-text rounded-4 bg-primary"
                    style="margin-left: -2.9rem; z-index: 99; border-color: #04A6FE;">
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
            <div class="text-end mb-4">
                <p><a class="link-offset-2 link-underline link-underline-opacity-0 text-primary"
                        href="/forgot-password">Forgot
                        Password?</a></p>
            </div>
            <button class="btn btn-primary w-100 py-2 mb-2 rounded-4 text-white" type="submit">Login</button>
            <a href="/register" class="btn btn-outline-primary w-100 py-2 rounded-4" type="submit">Register</a>
        </form>
    </div>
@endsection

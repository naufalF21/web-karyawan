@extends('layout')
@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh">
        <main class="form-signin w-100 m-auto">
            <div class="mb-5">
                <img class="mx-auto d-block" src="/assets/img/logo-algostudio.png" alt="logo-algostudio">
            </div>
            <p class="mx-auto mt-4 mb-3 fw-normal">Existing employee / Get started </p>
            <a class="btn btn-primary w-100 py-2 mb-2 rounded-4 text-white" href="/login">Login</a>
            <p class="mx-auto mt-2 fw-normal">New employee? <a
                    class="link-offset-2 link-underline link-underline-opacity-0 text-primary" href="/register">Create new
                    account</a></p>
        </main>
    </div>
@endsection

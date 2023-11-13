@extends('layout')
<nav class="navbar navbar-expand-lg bg-white container pt-4">
    <div class="container-fluid">
        <div>
            <a href="#"><img class="navbar-brand" src="/assets/img/logo-navbar.svg" alt="logo-algostudio"
                    style="height: 2.5rem"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div>
            <a href="{{ route('login') }}" class="btn btn-primary text-white px-4 fs-5">Login</a>
        </div>
    </div>
</nav>
<div class="container pt-4">
    <!-- Content here -->
    <div class="row gx-5 align-items-center justify-content-center">
        <div class="col-lg-8 col-xl-7 col-xxl-6">
            <div class="my-5 text-center text-xl-start">
                <div class="d-grid gap-3 d-lg-flex d-sm-none justify-content-sm-center justify-content-xl-start d-none">
                    <button class="btn btn-primary btn px-4 me-sm-3 text-white">Welcome Algostudio</button>
                </div>
                <h1 class="display-6 fw-bolder text-black-60 mt-4 mb-2">Expressing our gratitude<br>for your exceptional
                    efforts</h1>
                <p class="lead fw-normal text-black mb-4">Manage your work</p>
                <div class="d-grid gap-3 d-sm-flex d-lg-none justify-content-sm-center justify-content-xl-start">
                    <a class="btn btn-primary btn px-4 me-sm-3" href="#features">Welcome Algostudio</a>
                </div>
            </div>
        </div>

        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
            <img class="img-fluid rounded-3 my-5" src="/assets/img/budgeting.svg" alt="..." />
        </div>
    </div>
</div>
@include('layouts/footer')

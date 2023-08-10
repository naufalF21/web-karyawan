@extends('layout')
@section('container')
    <div class="container">
        <div class="row gap-5">
            @include('layouts.sidebar')
            <div class="col-9">
                <div class="d-flex mb-5">
                    <div class="d-flex flex-column gap-3">
                        <h5 class="fw-bold">Profile Photo</h5>
                        <img src="/assets/img/anime.png" alt="Rounded circle Image" class="rounded-circle" width="120"
                            height="120" />
                    </div>
                    <div class="d-flex justify-content-end align-items-center fw-bold gap-4" style="width: 70%">
                        <a href="#" class="text-primary" style="height: fit-content">Remove photo</a>
                        <a href="#" class="btn btn-primary fw-normal text-white px-3"
                            style="height: fit-content">Change
                            photo</a>
                    </div>
                </div>
                <h5 class="fw-bold">Profile Information</h5>
                <div class="pt-4 d-flex flex-row" style="gap: 10rem">
                    <div class="d-flex flex-column gap-4 justify-content-between">
                        <div class="d-flex flex-column">
                            <label for="username" class="text-secondary">Name</label>
                            <span id="username">{{ auth()->user()->name }}</span>
                        </div>
                        <div class="d-flex flex-column">
                            <label for="username" class="text-secondary">Address</label>
                            <span id="username">Kemantren Rejo, Pasuruan</span>
                        </div>
                        <div class="d-flex flex-column">
                            <label for="username" class="text-secondary">Contact</label>
                            <span id="username">085851986805</span>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-4 w-100 justify-content-between">
                        <div class="d-flex flex-column">
                            <label for="username" class="text-secondary">Email</label>
                            <span id="username">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="d-flex flex-row justify-content-between w-75">
                            <div class="d-flex flex-column">
                                <label for="username" class="text-secondary">Position</label>
                                <span id="username">UI/UX Design</span>
                            </div>
                            <button class="btn btn-primary text-white px-3">Edit</button>
                        </div>
                        <div class="d-flex flex-column">
                            <label for="username" class="text-secondary">Birthday</label>
                            <span id="username">10/6/2002</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout')
@include('layouts.navbar_email_verify')
<div class="container w-50">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Verify Your Email Address
        </div>
        <div class="card-body">
            <p class="card-text">Before proceeding, please check your email for a verification link. If you did not
                receive the email, click resend to request another.</p>
            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary text-white">Resend</button>
            </form>
        </div>
    </div>
</div>
{{-- notif --}}
@if (session('message'))
    <div class="toast align-items-center text-bg-primary border-0 position-fixed bottom-0 end-0 m-3" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body text-white">
                {{ session('message') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
@endif

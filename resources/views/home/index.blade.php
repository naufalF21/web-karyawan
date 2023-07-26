@extends('layout')
@section('content')
    <div class="container pt-4">
        @include('layouts.navbar')

        <!-- Content here -->
        <h1>Selamat datang, {{ auth()->user()->name }}</h1>
        <form action="/logout" method="post">
            @csrf
            <button class="btn btn-danger" type="submit">Logout</button>
        </form>
    </div>
@endsection

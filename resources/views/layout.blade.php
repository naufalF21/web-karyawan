<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('layouts.head')
</head>

<body>
    @hasSection('container')
        @include('layouts.navbar')
    @endif
    <main>
        @yield('content')
        @yield('container')
    </main>
    @hasSection('container')
        @include('layouts.footer')
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>

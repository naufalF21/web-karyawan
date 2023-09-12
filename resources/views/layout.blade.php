<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('layouts.head')
</head>

<body
    class="{{ Route::is('dashboard.index', 'dashboard.absen', 'dashboard.employees', 'dashboard.request', 'dashboard.report') ? 'sb-nav-fixed' : '' }}">
    @hasSection('container')
        @include('layouts.navbar')
    @endif
    <main>
        @yield('content')
        @yield('container')
        @yield('dashboard')
    </main>
    @hasSection('container')
        @include('layouts.footer')
    @endif

    <script src="https://kit.fontawesome.com/ba3adbadb9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    {{-- datatables cdn --}}
    {{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> --}}
    <script
        src="https://cdn.datatables.net/v/bs5/dt-1.13.6/b-2.4.2/b-html5-2.4.2/date-1.5.1/fh-3.4.0/r-2.5.0/sc-2.2.0/sp-2.2.0/sl-1.7.0/datatables.min.js">
    </script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>

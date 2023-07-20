<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('layouts.head')
</head>

<body>
    {{-- <header>
        @include('web.layout.header')
    </header> --}}
    <main>
        @yield('content')
    </main>
    {{-- <footer>
        @include('web.layout.footer')
    </footer> --}}
</body>

</html>

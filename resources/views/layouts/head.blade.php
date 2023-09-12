<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $title }} - Web Karyawan</title>

{{-- favicon --}}
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">

{{-- datatables cdn --}}
<link
    href="https://cdn.datatables.net/v/bs5/dt-1.13.6/b-2.4.2/b-html5-2.4.2/date-1.5.1/fh-3.4.0/r-2.5.0/sc-2.2.0/sp-2.2.0/sl-1.7.0/datatables.min.css"
    rel="stylesheet">

{{-- custom css --}}
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@hasSection('dashboard')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
@endif

@vite(['resources/js/app.js', 'resources/sass/app.scss'])

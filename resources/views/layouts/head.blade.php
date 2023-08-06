<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $title }} - Web Karyawan</title>

<!-- Fonts -->
{{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

{{-- custom css --}}
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

@vite(['resources/js/app.js', 'resources/sass/app.scss'])

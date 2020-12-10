<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIDesa - @yield('title')</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/sidesa.css') }}">
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">
	<div class="wrapper">
		@include('layouts.header')
		@include('layouts.sidebar')
		@yield('content')
		@include('layouts.footer')
	</div>
</body>
    <!-- Scripts -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('js/adminlte.min.js') }}"></script>
	<script src="{{ asset('js/sidesa.js') }}"></script>
</html>

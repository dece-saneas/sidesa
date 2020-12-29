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
	<!-- Script -->
	<script src="{{ asset('js/pace.min.js') }}"></script>
    <!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/pace.css') }}">
	<link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
	<link rel="stylesheet" href="{{ asset('css/summernote.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-tempusdominus.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/sidesa.css') }}">
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">
	<div class="wrapper">
		@include('layouts.header')
		@include('layouts.sidebar')
        @include('layouts.modal')
		@yield('content')
		@include('layouts.footer')
	</div>
</body>
    <!-- Scripts -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/jquery-mask.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script src="{{ asset('js/moment.min.js') }}"></script>
	<script src="{{ asset('js/daterangepicker.js') }}"></script>
	<script src="{{ asset('js/summernote.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-tempusdominus.min.js') }}"></script>
	<script src="{{ asset('js/adminlte.min.js') }}"></script>
	<script src="{{ asset('js/sidesa.js') }}"></script>
    @if (session('success'))
	<script type="text/javascript">
		$(function() {
			const Toast = Swal.mixin({
				toast: true,
				position: "top-end",
				showConfirmButton: false,
				timer: 3000
			});
			Toast.fire({
				icon: "success",
				title: "{{ session('success') }}"
			})
		});
	</script>
	@elseif (session('error'))
	<script type="text/javascript">
		$(function() {
			const Toast = Swal.mixin({
				toast: true,
				position: "top-end",
				showConfirmButton: false,
				timer: 3000
			});
			Toast.fire({
				icon: "error",
				title: "{{ session('error') }}"
			})
		});
	</script>
	@elseif (session('info'))
	<script type="text/javascript">
		$(function() {
			const Toast = Swal.mixin({
				toast: true,
				position: "top-end",
				showConfirmButton: false,
				timer: 3000
			});
			Toast.fire({
				icon: "info",
				title: "{{ session('info') }}"
			})
		});
	</script>
	@elseif (session('warning'))
	<script type="text/javascript">
		$(function() {
			const Toast = Swal.mixin({
				toast: true,
				position: "top-end",
				showConfirmButton: false,
				timer: 3000
			});
			Toast.fire({
				icon: "warning",
				title: "{{ session('warning') }}"
			})
		});
	</script>
	@endif
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIDesa - Sign in</title>
    <!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-icheck.min.css') }}">
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="{{ route('dashboard') }}" class="h1"><b>SID</b>esa</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Sign in to start your session</p>
				<form method="POST" action="{{ route('login') }}">
				@csrf
					<div class="input-group mb-3">
						<input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
						@error('email')
						<div class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</div>
						@enderror
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password" autocomplete="current-password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
						@error('password')
						<div class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</div>
						@enderror
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
								<label for="remember">Remember Me</label>
							</div>
						</div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
    <!-- Scripts -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/adminlte.min.js') }}"></script>
</html>
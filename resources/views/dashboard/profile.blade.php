@extends('layouts.master')
@section('title') Profil @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Profil</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Profil</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container">
            <div class="card card-widget widget-user">
                <div class="widget-user-header bg-primary">
                    <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="{{ asset('img/user/placeholder.jpg') }}" alt="User Avatar" id="fotoProfil">
                </div>
                <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="card-body mt-4">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password-confirm">Konfirmasi Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password-confirm">
                        </div>
                    </div>
                </div>
                <hr class="m-0">
                <div class="card-body">
                    <div class="float-right">
                        <button class="btn btn-success" type="submit"><i class="fas fa-save mr-2"></i>Save</button>
                    </div>
                    <a href="{{ route('dashboard') }}" class="btn btn-default"><i class="fas fa-times mr-2"></i>Cancel</a>
                </div>
                </form>
            </div>
                
		</div>
	</div>
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
@endsection

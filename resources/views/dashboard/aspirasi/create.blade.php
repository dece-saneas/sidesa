@extends('layouts.master')
@section('title') Aspirasi @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Aspirasi</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('aspiration')}}">Aspirasi</a></li>
						<li class="breadcrumb-item active" aria-current="page">Buat Aspirasi</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container">
            <div class="card">
				<form action="{{ route('aspiration.store') }}" method="POST">
				@csrf
					<div class="card-header">
						<h3 class="card-title">Tulis Aspirasi</h3>
					</div>
					<div class="card-body">
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Aspirasi Saya</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="4" name="description" id="description"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
					</div>
					<div class="card-footer text-right">
						<div class="btn-group">
							<a href="{{ route('aspiration') }}" class="btn btn-dark" type="submit"><i class="fas fa-angle-left mr-2"></i> Kembali</a>
							<button class="btn btn-success" type="submit">Kirim <i class="fas fa-location-arrow ml-2"></i></button>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
</div>
@endsection
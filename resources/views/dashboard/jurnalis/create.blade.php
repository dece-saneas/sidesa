@extends('layouts.master')
@section('title') Jurnalis @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Jurnalis</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('jurnalis')}}">Jurnalis</a></li>
						<li class="breadcrumb-item active" aria-current="page">Tambah</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container">
            <div class="card">
				<form action="{{ route('jurnalis.store') }}" method="POST">
				@csrf
					<div class="card-header">
						<h3 class="card-title">Tambah Jurnalis</h3>
					</div>
					<div class="card-body">
                            <div class="form-group">
                                <label for="user">Jurnalis</label>
                                <select class="form-control selectJurnalis @error('user') is-invalid @enderror" name="user" id="user">
                                    <option></option>
                                    <option value="0" selected>-</option>
                                    @foreach ($user as $no => $u)
                                    <option value="{{ $u->id }}">{{ $u->nik->code }} | {{ $u->name }}</option>
                                    @endforeach
                                </select>
                                @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
					</div>
					<div class="card-footer text-right">
						<div class="btn-group">
							<a href="{{ route('jurnalis') }}" class="btn btn-dark" type="submit"><i class="fas fa-angle-left mr-2"></i> Kembali</a>
							<button class="btn btn-success" type="submit">Tambah <i class="fas fa-plus-square ml-2"></i></button>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
</div>
@endsection

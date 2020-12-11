@extends('layouts.master')
@section('title') Rukun Tetangga @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Rukun Tetangga</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('rt')}}">Rukun Tetangga</a></li>
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
				<form action="{{ route('rt.store') }}" method="POST">
				@csrf
					<div class="card-header">
						<h3 class="card-title">Tambah Rukun Tetangga</h3>
					</div>
					<div class="card-body">
						<div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="number">Nomor RT</label>
                                <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" id="number" value="{{ old('number') }}">
                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="rw">Nomor RW</label>
                                <select class="form-control selectRW @error('rw') is-invalid @enderror" name="rw" id="rw">
                                    <option></option>
                                    @foreach ($rw as $no => $r)
                                    <option value="{{ $r->id }}">RW {{ $r->number }}</option>
                                    @endforeach
							    </select>
                                @error('rw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user">Ketua RT</label>
                            <select class="form-control selectKetuaRT @error('user') is-invalid @enderror" name="user" id="user">
                                <option></option>
                                <option value="0" selected>-</option>
                                @foreach ($user as $no => $u)
                                @if($u->hasrole('Ketua RT'))
                                @else
                                <option value="{{ $u->id }}">{{ $u->nik->code }} | {{ $u->name }}</option>
                                @endif
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
							<a href="{{ route('rt') }}" class="btn btn-dark" type="submit"><i class="fas fa-angle-left mr-2"></i> Kembali</a>
							<button class="btn btn-success" type="submit">Tambah <i class="fas fa-plus-square ml-2"></i></button>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
</div>
@endsection

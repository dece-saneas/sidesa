@extends('layouts.master')
@section('title') Penduduk @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Penduduk</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('penduduk')}}">Penduduk</a></li>
						<li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container">
            <div class="card">
				<form action="{{ route('penduduk.update', $user->id) }}" method="POST">
				@csrf @method('PUT')
					<div class="card-header">
						<h3 class="card-title">Ubah Data Penduduk</h3>
					</div>
					<div class="card-body">
						<div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name', $user->name)}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email', $user->email)}}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{old('nik', $user->nik->code)}}">
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">Jenis Kelamin</label>
                                <select class="form-control selectGender @error('gender') is-invalid @enderror" name="gender" id="gender">
                                    <option></option>
                                    <option value="Laki-Laki" @if(old('gender', $user->nik->gender) == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                    <option value="Perempuan" @if(old('gender', $user->nik->gender) == 'Perempuan') selected @endif>Perempuan</option>
							    </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="place">Tempat Lahir</label>
                                <input type="text" class="form-control @error('place') is-invalid @enderror" name="place" id="place" value="{{old('place', $user->nik->place_of_birth)}}">
                                @error('place')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dob">Tanggal Lahir</label>
                                <div class="input-group date" id="datetimeBirth" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input @error('bod') is-invalid @enderror" data-target="#datetimeBirth" name="dob" id="dob" value="{{old('dob', $user->nik->date_of_birth)}}">
                                    <div class="input-group-append" data-target="#datetimeBirth" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                                @error('bod')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" rows="2" name="address" id="address">{{old('address', $user->nik->address)}}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
					</div>
					<div class="card-header">
						<h3 class="card-title">Ganti Password</h3>
					</div>
					<div class="card-body">
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
					<div class="card-footer text-right">
						<div class="btn-group">
							<a href="{{ route('penduduk') }}" class="btn btn-dark" type="submit"><i class="fas fa-angle-left mr-2"></i> Kembali</a>
							<button class="btn btn-success" type="submit">Simpan <i class="fas fa-save ml-2"></i></button>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
</div>
@endsection

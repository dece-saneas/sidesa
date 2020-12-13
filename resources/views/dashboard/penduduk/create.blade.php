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
				<form action="{{ route('penduduk.store') }}" method="POST">
				@csrf
					<div class="card-header">
						<h3 class="card-title">Tambah Penduduk</h3>
					</div>
					<div class="card-body">
						<div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nama Lengkap *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="-">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nik">NIK *</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik">
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">Jenis Kelamin *</label>
                                <select class="form-control selectGender @error('gender') is-invalid @enderror" name="gender" id="gender">
                                    <option></option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
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
                                <label for="dad">Ayah</label>
                                <select class="form-control selectDady @error('dad') is-invalid @enderror" name="dad" id="dad">
                                    <option></option>
                                    <option value="" selected>-</option>
                                    @foreach($user as $no => $u)
                                    <option value="{{ $u->id }}">{{ $u->nik->code }} - {{ $u->name }}</option>
                                    @endforeach
							    </select>
                                @error('dad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mom">Ibu</label>
                                <select class="form-control selectMommy @error('mom') is-invalid @enderror" name="mom" id="mom">
                                    <option></option>
                                    <option value="" selected>-</option>
                                    @foreach($user as $no => $u)
                                    <option value="{{ $u->id }}">{{ $u->nik->code }} - {{ $u->name }}</option>
                                    @endforeach
							    </select>
                                @error('mom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="place">Tempat Lahir *</label>
                                <input type="text" class="form-control @error('place') is-invalid @enderror" name="place" id="place">
                                @error('place')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="dob">Tanggal Lahir *</label>
                                <div class="input-group date" id="datetimeBirth" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input @error('bod') is-invalid @enderror" data-target="#datetimeBirth" name="dob" id="dob">
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
                            <div class="form-group col-md-2">
                                <label for="blood">Gol Darah</label>
                                <select class="form-control selectType @error('blood') is-invalid @enderror" name="blood" id="blood">
                                    <option></option>
                                    <option value="" selected>-</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
							    </select>
                                @error('blood')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="religion">Agama</label>
                                <select class="form-control selectReligion @error('religion') is-invalid @enderror" name="religion" id="religion">
                                    <option></option>
                                    <option value="" selected>-</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghuchu">Konghuchu</option>
							    </select>
                                @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="married">Status Perkawinan</label>
                                <select class="form-control selectType @error('married') is-invalid @enderror" name="married" id="married">
                                    <option></option>
                                    <option value="" selected>-</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
							    </select>
                                @error('married')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="job">Pekerjaan</label>
                                <input type="text" class="form-control @error('job') is-invalid @enderror" name="job" id="job" placeholder="-">
                                @error('job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat *</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" rows="2" name="address" id="address"></textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
						<div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dusun">Dusun *</label>
                                <select class="form-control selectDusun @error('dusun') is-invalid @enderror" name="dusun" id="dusunJSON" data-url="{{ route('site') }}">
                                    <option></option>
                                    @foreach( $dusun as $d )
                                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                                    @endforeach
							    </select>
                                @error('dusun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rw">RW *</label>
                                <select class="form-control selectRW @error('rw') is-invalid @enderror" name="rw" id="rwJSON" data-url="{{ route('site') }}">
                                    <option></option>
							    </select>
                                @error('rw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rt">RT *</label>
                                <select class="form-control selectRT @error('rt') is-invalid @enderror" name="rt" id="rt">
                                    <option></option>
							    </select>
                                @error('rt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
					</div>
                    <div class="card-body">
                        <div class="form-group">
                            <h5>Kolom dengan tanda (*) wajib diisi.</h5>
                        </div>
                    </div>
					<div class="card-footer text-right">
						<div class="btn-group">
							<a href="{{ route('penduduk') }}" class="btn btn-dark" type="submit"><i class="fas fa-angle-left mr-2"></i> Kembali</a>
							<button class="btn btn-success" type="submit">Tambah <i class="fas fa-plus-square ml-2"></i></button>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
</div>
@endsection

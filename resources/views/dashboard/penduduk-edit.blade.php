@extends('layouts.master')
@section('title') Penduduk @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">EditPenduduk</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('penduduk')}}">Penduduk</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container">
            <div class="card">
				<form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
				@csrf @method('PUT')
					<div class="card-body">
						<div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nama Lengkap *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $penduduk->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $penduduk->email }}">
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
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{ $penduduk->nik->code }}">
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
                                    <option value="">-</option>
                                    <option value="Laki-Laki" @if($penduduk->nik->gender == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                    <option value="Perempuan" @if($penduduk->nik->gender == 'Perempuan') selected @endif>Perempuan</option>
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
                                    <option value="">-</option>
                                    @foreach($user as $no => $u)
                                    <option value="{{ $u->id }}" @if($penduduk->nik->father_id == $u->id) selected @endif>{{ $u->nik->code }} - {{ $u->name }}</option>
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
                                    <option value="">-</option>
                                    @foreach($user as $no => $u)
                                    <option value="{{ $u->id }}" @if($penduduk->nik->mother_id == $u->id) selected @endif>{{ $u->nik->code }} - {{ $u->name }}</option>
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
                                <input type="text" class="form-control @error('place') is-invalid @enderror" name="place" id="place" value="{{ $penduduk->nik->place_of_birth }}">
                                @error('place')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="dob">Tanggal Lahir *</label>
                                <div class="input-group date" id="datetimeBirth" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input @error('bod') is-invalid @enderror" data-target="#datetimeBirth" name="dob" id="dob" value="{{ $penduduk->nik->date_of_birth }}">
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
                                    <option value="">-</option>
                                    <option value="A" @if($penduduk->nik->blood_type == 'A') selected @endif>A</option>
                                    <option value="B" @if($penduduk->nik->blood_type == 'B') selected @endif>B</option>
                                    <option value="AB" @if($penduduk->nik->blood_type == 'AB') selected @endif>AB</option>
                                    <option value="O" @if($penduduk->nik->blood_type == 'O') selected @endif>O</option>
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
                                    <option value="">-</option>
                                    <option value="Islam" @if($penduduk->nik->religion == 'Islam') selected @endif>Islam</option>
                                    <option value="Kristen" @if($penduduk->nik->religion == 'Kristen') selected @endif>Kristen</option>
                                    <option value="Katolik" @if($penduduk->nik->religion == 'Katolik') selected @endif>Katolik</option>
                                    <option value="Hindu" @if($penduduk->nik->religion == 'Hindu') selected @endif>Hindu</option>
                                    <option value="Buddha" @if($penduduk->nik->religion == 'Buddha') selected @endif>Buddha</option>
                                    <option value="Konghuchu" @if($penduduk->nik->religion == 'Konghuchu') selected @endif>Konghuchu</option>
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
                                    <option value="">-</option>
                                    <option value="Kawin" @if($penduduk->nik->married_status == 'Kawin') selected @endif>Kawin</option>
                                    <option value="Belum Kawin" @if($penduduk->nik->married_status == 'Belum Kawin') selected @endif>Belum Kawin</option>
							    </select>
                                @error('married')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="job">Pekerjaan</label>
                                <input type="text" class="form-control @error('job') is-invalid @enderror" name="job" id="job" placeholder="-" value="{{ $penduduk->nik->job_status }}">
                                @error('job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat *</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" rows="2" name="address" id="address">{{ $penduduk->nik->address }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
						<div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dusun">Dusun @if(auth()->user()->hasRole('Ketua RT')) * @endif</label>
                                <select class="form-control selectDusun @error('dusun') is-invalid @enderror" name="dusun" id="dusunJSON" data-url="{{ route('site') }}">
                                    <option></option>
                                    @foreach( $dusun as $d )
                                    <option value="{{ $d->id }}" @if($penduduk->nik->dusun_id == $d->id) selected @endif)>{{ $d->name }}</option>
                                    @endforeach
							    </select>
                                @error('dusun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rw">RW @if(auth()->user()->hasRole('Ketua RT')) * @endif</label>
                                <select class="form-control selectRW @error('rw') is-invalid @enderror rw" name="rw" id="rwJSON" data-url="{{ route('site') }}">
                                    <option></option>
                                    @if($penduduk->nik->dusun_id != NULL)
                                    <option value="{{ $penduduk->nik->rukun_warga_id }}" selected>{{ $penduduk->nik->rukun_warga->number }}</option>
                                    @endif
							    </select>
                                @error('rw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rt">RT @if(auth()->user()->hasRole('Ketua RT')) * @endif</label>
                                <select class="form-control selectRT @error('rt') is-invalid @enderror rt" name="rt" id="rt">
                                    <option></option>
                                    @if($penduduk->nik->dusun_id != NULL)
                                    <option value="{{ $penduduk->nik->rukun_tetangga_id }}" selected>{{ $penduduk->nik->rukun_tetangga->number }}</option>
                                    @endif
							    </select>
                                @error('rt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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
                    <div class="card-body">
                        <div class="form-group">
                            <h5>Kolom dengan tanda (*) wajib diisi.</h5>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="card-body">
                        <div class="float-right">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save mr-2"></i>Save</button>
                        </div>
                        <a href="{{ route('penduduk') }}" class="btn btn-default"><i class="fas fa-times mr-2"></i>Cancel</a>
                    </div>
				</form>
            </div>
		</div>
	</div>
</div>
@endsection

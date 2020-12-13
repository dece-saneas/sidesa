@extends('layouts.master')
@section('title') Rukun Warga @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Rukun Warga</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('rw')}}">Rukun Warga</a></li>
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
				<form action="{{ route('rw.store') }}" method="POST">
				@csrf
					<div class="card-header">
						<h3 class="card-title">Tambah Rukun Warga</h3>
					</div>
					<div class="card-body">
						<div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dusun">Dusun</label>
                                <select class="form-control selectDusun @error('dusun') is-invalid @enderror" name="dusun" id="dusun">
                                    <option></option>
                                    @foreach ($dusun as $no => $d)
                                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                                    @endforeach
							    </select>
                                @error('dusun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="number">Nomor RW</label>
                                <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" id="number">
                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user">Ketua RW</label>
                            <select class="form-control selectKetuaRW @error('user') is-invalid @enderror" name="user" id="user">
                                <option></option>
                                <option value="0" selected>-</option>
                                @foreach ($user as $no => $u)
                                @if($u->hasrole(['Admin', 'Ketua RT', 'Ketua RW', 'Kepala Dusun']))
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
							<a href="{{ route('rw') }}" class="btn btn-dark" type="submit"><i class="fas fa-angle-left mr-2"></i> Kembali</a>
							<button class="btn btn-success" type="submit">Tambah <i class="fas fa-plus-square ml-2"></i></button>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
</div>
@endsection

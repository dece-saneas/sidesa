@extends('layouts.master')
@section('title') Dusun @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Dusun</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('rt')}}">Dusun</a></li>
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
				<form action="{{ route('dusun.update', $dusun->id) }}" method="POST">
				@csrf @method('PUT')
					<div class="card-header">
						<h3 class="card-title">Ubah Data Dusun</h3>
					</div>
					<div class="card-body">
						<div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nama Dusun</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name', $dusun->name)}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="user">Kepala Dusun</label>
                                <select class="form-control selectKepalaDusun @error('user') is-invalid @enderror" name="user" id="user">
                                    <option></option>
                                    <option value="0" selected>-</option>
                                    @foreach ($user as $no => $u)
                                    @if($u->hasrole(['Admin', 'Ketua RT', 'Ketua RW', 'Kepala Dusun']))
                                    @if($u->id == $dusun->user_id)
                                    <option value="{{ $u->id }}" selected>{{ $u->nik->code }} | {{ $u->name }}</option>
                                    @endif
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
					</div>
					<div class="card-footer text-right">
						<div class="btn-group">
							<a href="{{ route('dusun') }}" class="btn btn-dark" type="submit"><i class="fas fa-angle-left mr-2"></i> Kembali</a>
							<button class="btn btn-success" type="submit">Simpan <i class="fas fa-save ml-2"></i></button>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
</div>
@endsection

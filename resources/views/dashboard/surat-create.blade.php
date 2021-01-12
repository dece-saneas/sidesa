@extends('layouts.master')
@section('title') Permintaan Surat @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Permintaan Surat</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('surat')}}">Permintaan Surat</a></li>
						<li class="breadcrumb-item active" aria-current="page">Formulir</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container">
            <div class="card">
				<form action="{{ route('surat.store') }}" method="POST">
				@csrf
					<div class="card-header">
						<h3 class="card-title">Formulir Permintaan Surat</h3>
					</div>
					<div class="card-body">
                        <div class="form-group">
                            <label for="type">Jenis Surat</label>
                            <select class="form-control selectTypeSurat @error('type') is-invalid @enderror" name="type" id="type">
                                <option></option>
                                <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                                <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
                                <option value="Surat Keterangan Miskin">Surat Keterangan Miskin</option>
                                <option value="Surat Keterangan Belum Pernah Menikah">Surat Keterangan Belum Pernah Menikah</option>
                                <option value="Surat Keterangan Kelahiran">Surat Keterangan Kelahiran</option>
                                <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                                <option value="Surat Keterangan Beda Nama">Surat Keterangan Beda Nama</option>
                                <option value="Surat Keterangan Penghasilan">Surat Keterangan Penghasilan</option>
                                <option value="Surat Keterangan Harga Tanah">Surat Keterangan Harga Tanah</option>
                            </select>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" rows="2" name="message" id="message" placeholder="Tulis pesan anda"></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
					</div>
                    <hr class="m-0">
                    <div class="card-body">
                        <div class="float-right">
                            <button class="btn btn-success" type="submit"><i class="fas fa-paper-plane mr-2"></i>Send</button>
                        </div>
                        <a href="{{ route('surat') }}" class="btn btn-default"><i class="fas fa-times mr-2"></i>Cancel</a>
                    </div>
				</form>
            </div>
		</div>
	</div>
</div>
@endsection

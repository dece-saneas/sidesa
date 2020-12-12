@extends('layouts.master')
@section('title') Laporan Keuangan @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Laporan Keuangan</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('anggaran')}}">Laporan Keuangan</a></li>
						<li class="breadcrumb-item active" aria-current="page">Catat Keuangan</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container">
            <div class="card">
				<form action="{{ route('anggaran.store') }}" method="POST">
				@csrf
					<div class="card-header">
						<h3 class="card-title">Catat Keuangan</h3>
					</div>
					<div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="type">Jenis Arus</label>
                                <select class="form-control selectTypeKas @error('type') is-invalid @enderror" name="type" id="type">
                                    <option></option>
                                    <option value="Pemasukan">Pemasukan</option>
                                    <option value="Pengeluaran">Pengeluaran</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="category">Kategori</label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" id="category" placeholder="contoh : APBD">
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="amount">Jumlah Anggaran</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                    </div>
                                    <input type="text" class="form-control rupiah @error('amount') is-invalid @enderror" name="amount" id="amount">
                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select class="form-control selectStatus @error('status') is-invalid @enderror" name="status" id="status">
                                    <option></option>
                                    <option value="Sudah Terealisasi">Sudah Terealisasi</option>
                                    <option value="Dalam Pengerjaan">Dalam Pengerjaan</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Keterangan</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="2" name="description" id="description" placeholder="Tulis keterangan anggaran"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
					</div>
					<div class="card-footer text-right">
						<div class="btn-group">
							<a href="{{ route('anggaran') }}" class="btn btn-dark" type="submit"><i class="fas fa-angle-left mr-2"></i> Kembali</a>
							<button class="btn btn-success" type="submit">Kirim <i class="fas fa-location-arrow ml-2"></i></button>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
</div>
@endsection

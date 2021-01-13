@extends('layouts.master')
@section('title') Laporan Keuangan @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Edit Laporan Keuangan</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('anggaran')}}">Laporan Keuangan</a></li>
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
				<form action="{{ route('anggaran.update', $anggaran->id) }}" method="POST">
				@csrf @method('PUT')
					<div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="type">Jenis Arus</label>
                                <select class="form-control selectTypeKas @error('type') is-invalid @enderror" name="type" id="type">
                                    <option></option>
                                    <option value="Pemasukan" @if($anggaran->type == 'Pemasukan') selected @endif>Pemasukan</option>
                                    <option value="Pengeluaran" @if($anggaran->type == 'Pengeluaran') selected @endif>Pengeluaran</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="category">Kategori</label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" id="category" placeholder="contoh : APBD" value="{{ $anggaran->category }}">
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
                                    <input type="text" class="form-control rupiah @error('amount') is-invalid @enderror" name="amount" id="amount" value="{{ $anggaran->amount }}">
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
                                    <option value="Sudah Terealisasi" @if($anggaran->status == 'Sudah Terealisasi') selected @endif>Sudah Terealisasi</option>
                                    <option value="Dalam Pengerjaan" @if($anggaran->status == 'Dalam Pengerjaan') selected @endif>Dalam Pengerjaan</option>
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
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="2" name="description" id="description" placeholder="Tulis keterangan anggaran">{{ $anggaran->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
					</div>
                    <hr class="m-0">
                    <div class="card-body">
                        <div class="float-right">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save mr-2"></i>Save</button>
                        </div>
                        <a href="{{ route('anggaran') }}" class="btn btn-default"><i class="fas fa-times mr-2"></i>Cancel</a>
                    </div>
				</form>
            </div>
		</div>
	</div>
</div>
@endsection

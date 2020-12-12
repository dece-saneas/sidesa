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
						<li class="breadcrumb-item active" aria-current="page">Laporan Keuangan</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container-fluid">
			<div class="text-right mb-4">
				<div class="btn-group mb-2">
                    @can('anggaran-create')
					<a href="{{ route('anggaran.create') }}" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah</a>
                    @endcan
					<a href="{{ route('anggaran') }}" class="btn btn-dark" id="refresh"><i class="fas fa-sync-alt mr-2 refresh"></i>Refresh</a>
				</div>
			</div>
			@if (count($anggaran) > 0)
			<div class="card">
				<div class="card-body table-responsive">
					<table class="table table-sm table-hover">
						<thead>
							<tr>
								<th width="5%" class="text-center">No</th>
								<th width="10%">No Anggaran</th>
								<th width="15%">Jenis</th>
								<th width="10%">Kategori</th>
								<th width="10%">Jumlah Anggaran</th>
								<th width="35%">Keterangan</th>
								<th width="5%" class="text-center">Status</th>
								<th width="10%" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($anggaran as $no => $a)
							<tr>
								<td class="align-middle text-center">{{ $no+1+(($anggaran->currentpage()-1)*10) }}</td>
								<td class="align-middle">{{ $a->code }}</td>
								<td class="align-middle">{{ $a->type }}</td>
								<td class="align-middle">{{ $a->category }}</td>
								<td class="align-middle">Rp {{ number_format($a->amount,2,',','.') }}</td>
								<td class="align-middle">{{ $a->description }}</td>
								<td class="align-middle text-center">
                                    <span class="badge badge-primary">{{ $a->status }}</span>
                                </td>
								<td class="align-middle text-center">
									<div class="btn-group" role="group">
                                        @can('anggaran-edit')
										<a href="{{ route('anggaran.edit', $a->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('anggaran-destroy')
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-delete" data-title="Hapus Catatan Anggaran" data-note="Proses tidak dapat dibatalkan." data-url="{{ route('anggaran.destroy', $a->id) }}"><i class="fas fa-trash"></i></button>
                                        @endcan
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			{{ $anggaran->links('layouts.pagination') }}
			@else
			<div class="row justify-content-center no-result">
				<img src="{{ asset('img/no-results.gif')}}" alt="">
			</div>
			@endif
		</div>
	</div>
</div>
@endsection

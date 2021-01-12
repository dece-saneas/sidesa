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
						<li class="breadcrumb-item active" aria-current="page">Permintaan Surat</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container-fluid">
			@if (count($surat) > 0)
			<div class="row">
                <div class="col-md-2">
					<div class="card">
						<div class="card-body text-center">
							<a class="btn btn-success btn-block" href="{{ route('surat.create') }}"><i class="fas fa-plus mr-2"></i>Create New</a>
							<a class="btn btn-default btn-block" href=""><i class="fas fa-sync-alt mr-2"></i>Refresh</a>
						</div>
                	</div>
				</div>
				<div class="col-md-10">
					<div class="card">
						<div class="card-body table-responsive">
							<table class="table table-sm table-hover">
								<thead>
									<tr>
										<th width="5%" class="text-center">No</th>
										<th width="10%">NIK</th>
										<th width="15%">Nama</th>
										<th width="10%">Jenis Surat</th>
										<th width="45%">Isi Pesan</th>
										<th width="5%" class="text-center">Status</th>
										<th width="10%" class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($surat as $no => $s)
									<tr>
										<td class="align-middle text-center">{{ $no+1+(($surat->currentpage()-1)*10) }}</td>
										<td class="align-middle ">{{ $s->user->nik->code }}</td>
										<td class="align-middle">{{ $s->user->name }}</td>
										<td class="align-middle">{{ $s->type }}</td>
										<td class="align-middle">{{ $s->message }}</td>
										<td class="align-middle text-center">
											@if($s->status == 'Terkirim')
											<a href="#" data-container="body" data-toggle="popover" data-placement="top" data-content="Permintaan surat berhasil dikirim."><span class="badge badge-primary">Terkirim</span></a>
											@elseif($s->status == 'Di Proses')
											<a href="#" data-container="body" data-toggle="popover" data-placement="top" data-content="Permintaan surat kamu sedang di proses."><span class="badge badge-success">Di Proses</span></a>
											@else
											<a href="#" data-container="body" data-toggle="popover" data-placement="top" data-content="Surat kamu sudah bisa di ambil di kantor."><span class="badge badge-dark">Selesai</span></a>
											@endif
										</td>
										<td class="align-middle text-center">
											<div class="btn-group" role="group">
												@can('surat-process')
												@if($s->status == 'Terkirim' || $s->status == 'Di Proses')
												<a href="{{ route('surat.process', $s->id) }}" class="btn btn-primary"><i class="fas fa-user-check"></i></a>
												@else
												<button class="btn btn-primary"disabled><i class="fas fa-user-check"></i></button>
												@endif
												@endcan
												@if($s->status == 'Di Proses')
												<button type="button" class="btn btn-dark" disabled><i class="fas fa-trash"></i></button>
												@else
												<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-delete" data-title="Hapus Permintaan Surat" data-note="Proses tidak dapat dibatalkan." data-url="{{ route('surat.destroy', $s->id) }}"><i class="fas fa-trash"></i></button>
												@endif
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					{{ $surat->links('layouts.pagination') }}
                </div>
			</div>
			@else
			<div class="row justify-content-center no-result">
				<img src="{{ asset('img/no-results.gif')}}" alt="">
			</div>
			@if(auth()->user()->can('surat-create'))
			<div class="row justify-content-center">
				<a href="{{ route('surat.create') }}" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Create New</a>
			</div>
			@else
			<div class="row justify-content-center mt-2">
				<a href="" class="btn btn-default"><i class="fas fa-sync-alt mr-2"></i>Refresh</a>
			</div>
			@endif			
			@endif
		</div>
	</div>
</div>
@endsection

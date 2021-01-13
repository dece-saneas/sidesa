@extends('layouts.master')
@section('title') Aspirasi @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Aspirasi</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Aspirasi</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container-fluid">
			@if (count($aspirasi) > 0)
			<div class="row">
                <div class="col-md-2">
					<div class="card">
						<div class="card-body text-center">
                            @can('aspirasi-create')
							<a class="btn btn-success btn-block" href="{{ route('aspiration.create') }}">Create New</a>
                            @endcan
							<a class="btn btn-default btn-block" href="">Refresh</a>
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
										<th width="10%">Pengirim</th>
										<th width="15%">Judul</th>
										<th width="55%">Isi Aspirasi</th>
										<th width="5%" class="text-center">Status</th>
										<th width="10%" class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($aspirasi as $no => $a)
									<tr>
										<td class="align-middle text-center">{{ $no+1+(($aspirasi->currentpage()-1)*10) }}</td>
										<td class="align-middle">{{ $a->user->name }}</td>
										<td class="align-middle">{{ $a->title }}</td>
										<td class="align-middle">{{ $a->message }}</td>
										<td class="align-middle text-center">
											@if($a->status == 'Terkirim')
											<a href="#" data-container="body" data-toggle="popover" data-placement="top" data-content="Aspirasi kamu berhasil dikirim."><span class="badge badge-primary">Terkirim</span></a>
											@elseif($a->status == 'Sudah Diterima')
											<a href="#" data-container="body" data-toggle="popover" data-placement="top" data-content="Aspirasi kamu sudah di terima."><span class="badge badge-success">Sudah Diterima</span></a>
											@endif
										</td>
										<td class="align-middle text-center">
											<div class="btn-group" role="group">
												@can('aspirasi-confirm')
                                                @if($a->status == 'Terkirim')
												<a href="{{ route('aspiration.process', $a->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-user-check"></i></a>
                                                @elseif($a->status == 'Sudah Diterima')
                                                <button class="btn btn-sm btn-primary" disabled><i class="fas fa-user-check"></i></button>
                                                @endif
												@endcan
												@can('aspirasi-destroy')
												<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-delete" data-title="Hapus Aspirasi" data-note="Proses tidak dapat dibatalkan." data-url="{{ route('aspiration.destroy', $a->id) }}"><i class="fas fa-trash"></i></button>
												@endcan
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					{{ $aspirasi->links('layouts.pagination') }}
                </div>
			</div>
			@else
			<div class="row justify-content-center no-result">
				<img src="{{ asset('img/no-results.gif')}}" alt="">
			</div>
			@if(auth()->user()->can('aspirasi-create'))
			<div class="row justify-content-center">
				<a href="{{ route('aspiration.create') }}" class="btn btn-success">Create New</a>
			</div>
			@else
			<div class="row justify-content-center mt-2">
				<a href="" class="btn btn-default">Refresh</a>
			</div>
			@endif
			@endif
		</div>
	</div>
</div>
@endsection

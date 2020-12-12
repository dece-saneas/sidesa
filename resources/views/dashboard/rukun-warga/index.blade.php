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
						<li class="breadcrumb-item active" aria-current="page">Rukun Warga</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content">
		<div class="container-fluid">
			<div class="text-right mb-4">
				<div class="btn-group">
					<a href="{{ route('rw.create') }}" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah</a>
					<a href="{{ route('rw') }}" class="btn btn-dark" id="refresh"><i class="fas fa-sync-alt mr-2 refresh"></i></i>Refresh</a>
				</div>
			</div>
			@if (count($rw) > 0)
			<div class="card">
				<div class="card-body table-responsive">
					<table class="table table-sm table-hover">
						<thead>
							<tr>
								<th width="5%" class="text-center">No</th>
								<th width="10%">Dusun</th>
								<th width="5%">RW</th>
								<th width="15%">Ketua RW</th>
								<th width="10%" class="text-center">Jenis Kelamin</th>
								<th width="25%">Alamat</th>
								<th width="20%" class="text-center">Status Penduduk</th>
								<th width="10%" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($rw as $no => $r)
							<tr>
								<td class="align-middle text-center">{{ $no+1+(($rw->currentpage()-1)*10) }}</td>
								<td class="align-middle ">{{ $r->dusun->name}}</td>
								<td class="align-middle ">{{ $r->number }}</td>
								<td class="align-middle">@if($r->user_id > 0) {{$r->user->name}} @else - @endif</td>
								<td class="align-middle text-center">@if($r->user_id > 0) {{$r->user->nik->gender}} @else - @endif</td>
								<td class="align-middle">@if($r->user_id > 0) {{$r->user->nik->address}} @else - @endif</td>
								<td class="align-middle text-center">
                                    @if($r->user_id > 0)
									@if( $r->user->hasRole('Warga') )
									@else <span class="badge badge-dark">Non Warga</span>
									@endif
									@foreach ($r->user->getRoleNames() as $role) 
									<span class="badge badge-primary">{{ $role }}</span>
									@endforeach
                                    @else - @endif
								</td>
								<td class="align-middle text-center">
									<div class="btn-group" role="group">
										<a href="{{ route('rw.edit', $r->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-delete" data-title="Hapus RW" data-note="Anda akan menghapus RW {{$r->number}} dari Dusun {{$r->dusun->name}}. Menghapus RW akan menghilangkan semua RT di bawahnya!" data-url="{{ route('rw.destroy', $r->id) }}"><i class="fas fa-trash"></i></button>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			{{ $rw->links('layouts.pagination') }}
			@else
			<div class="row justify-content-center no-result">
				<img src="{{ asset('img/no-results.gif')}}" alt="">
			</div>
			@endif
		</div>
	</div>
</div>
@endsection

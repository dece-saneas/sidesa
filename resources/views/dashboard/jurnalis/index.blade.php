@extends('layouts.master')
@section('title') Jurnalis @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Jurnalis</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Jurnalis</li>
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
					<a href="{{ route('jurnalis.create') }}" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah</a>
					<a href="{{ route('jurnalis') }}" class="btn btn-dark" id="refresh"><i class="fas fa-sync-alt mr-2 refresh"></i>Refresh</a>
				</div>
			</div>
			@if (count($jurnalis) > 0)
			<div class="card">
				<div class="card-body table-responsive">
					<table class="table table-sm table-hover">
						<thead>
							<tr>
								<th width="5%" class="text-center">No</th>
								<th width="10%">ID Jurnalis</th>
								<th width="15%">Nama</th>
								<th width="10%" class="text-center">Jenis Kelamin</th>
								<th width="30%">Alamat</th>
								<th width="20%" class="text-center">Status Penduduk</th>
								<th width="10%" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($jurnalis as $no => $j)
							<tr>
								<td class="align-middle text-center">{{ $no+1+(($jurnalis->currentpage()-1)*10) }}</td>
								<td class="align-middle ">{{ $j->code }}</td>
								<td class="align-middle">{{ $j->user->name }}</td>
								<td class="align-middle text-center">{{ $j->user->nik->gender }}</td>
								<td class="align-middle">{{ $j->user->nik->address }}</td>
								<td class="align-middle text-center">
									@if($j->user->hasRole('Warga'))
									@else <a href="{{ route('penduduk.toggle.warga', $j->user->id) }}"><span class="badge badge-dark">Non Warga</span></a>
									@endif
									@foreach ($j->user->getRoleNames() as $role) 
                                    @if($role == 'Warga')
									<a href="{{ route('penduduk.toggle.warga', $j->user->id) }}"><span class="badge badge-primary">Warga</span></a>
                                    @else
									<span class="badge badge-primary">{{ $role }}</span>
                                    @endif
									@endforeach
								</td>
								<td class="align-middle text-center">
									<div class="btn-group" role="group">
                                        @can('jurnalis-edit')
										<a href="{{ route('penduduk.edit', $j->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        @endcan
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-delete" data-title="Hapus Jurnalis" data-note="Anda akan menghapus {{$j->user->name}} dari daftar Jurnalis." data-url="{{ route('jurnalis.destroy', $j->id) }}"><i class="fas fa-trash"></i></button>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			{{ $jurnalis->links('layouts.pagination') }}
			@else
			<div class="row justify-content-center no-result">
				<img src="{{ asset('img/no-results.gif')}}" alt="">
			</div>
			@endif
		</div>
	</div>
</div>
@endsection

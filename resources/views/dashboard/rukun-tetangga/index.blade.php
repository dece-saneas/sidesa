@extends('layouts.master')
@section('title') Rukun Tetangga  @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Rukun Tetangga</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Rukun Tetangga</li>
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
					<a href="#" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah</a>
					<a href="{{ route('rt') }}" class="btn btn-dark" id="refresh"><i class="fas fa-sync-alt mr-2 refresh"></i></i>Refresh</a>
				</div>
			</div>
			@if (count($user) > 0)
			
			<div class="card">
				<div class="card-body table-responsive">
					<table class="table table-sm table-hover">
						<thead>
							<tr>
								<th width="5%" class="text-center">No</th>
								<th width="5%">RW</th>
								<th width="5%">RT</th>
								<th width="15%">Ketua RT</th>
								<th width="10%" class="text-center">Jenis Kelamin</th>
								<th width="30%">Alamat</th>
								<th width="20%" class="text-center">Status Penduduk</th>
								<th width="10%" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($user as $no => $u)
							<tr>
								<td class="align-middle text-center">{{ $no+1 }}</td>
								<td class="align-middle ">{{ $u->rukun_warga->name }}</td>
								<td class="align-middle ">{{ $u->name }}</td>
								<td class="align-middle">{{ $u->user->name }}</td>
								<td class="align-middle text-center">{{ $u->user->nik->gender }}</td>
								<td class="align-middle">{{ $u->user->nik->address }}</td>
								<td class="align-middle text-center">
									@if( $u->user->hasRole('Warga') )
									@else <span class="badge badge-dark">Non Warga</span>
									@endif
									@foreach ($u->user->getRoleNames() as $role) 
									<span class="badge badge-primary">{{ $role }}</span>
									@endforeach
								</td>
								<td class="align-middle text-center">
									<form action="{{ route('rt.destroy', $u->id) }}" method="POST">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="btn-group" role="group">
										<a href="#" class="btn btn-primary"><i class="fas fa-edit"></i></a>
										<button type="submit" class="btn btn-dark"><i class="fas fa-trash"></i></button>
									</div>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			{{ $user->links('layouts.pagination') }}
			@else
			<div class="row justify-content-center no-result">
				<img src="{{ asset('img/no-results.gif')}}" alt="">
			</div>
			@endif
		</div>
	</div>
</div>
@endsection

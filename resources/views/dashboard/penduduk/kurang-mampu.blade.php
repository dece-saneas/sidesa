@extends('layouts.master')
@section('title') Penduduk @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Penduduk</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Penduduk</li>
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
					<a href="{{ route('penduduk.filter.kurangmampu') }}" class="btn btn-dark"><i class="fas fa-caret-down mr-2"></i>Kurang Mampu</a>
					<a href="{{ route('penduduk.filter.warga') }}" class="btn btn-dark"><i class="fas fa-caret-down mr-2"></i>Warga Desa</a>
					<a href="" class="btn btn-dark"><i class="fas fa-caret-square-left mr-2"></i>Filter</a>
				</div>
				<div class="btn-group mb-2">
					<a href="{{ route('penduduk.create') }}" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah</a>
					<a href="{{ route('penduduk') }}" class="btn btn-dark"><i class="fas fa-sync-alt mr-2 refresh"></i>Refresh</a>
				</div>
			</div>
			@if (count($user) > 0)
			<div class="card">
				<div class="card-body table-responsive">
					<table class="table table-sm table-hover">
						<thead>
							<tr>
								<th width="5%" class="text-center">No</th>
								<th width="10%">NIK</th>
								<th width="15%">Nama</th>
								<th width="10%" class="text-center">Jenis Kelamin</th>
								<th width="30%">Alamat</th>
								<th width="10%" class="text-center">Status Penduduk</th>
								<th width="10%" class="text-center">Warga Mampu</th>
								<th width="10%" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($user as $no => $u)
							<tr>
								<td class="align-middle text-center">{{ $no+1+(($user->currentpage()-1)*10) }}</td>
								<td class="align-middle ">{{ $u->user->nik->code }}</td>
								<td class="align-middle">{{ $u->user->name }}</td>
								<td class="align-middle text-center">{{ $u->user->nik->gender }}</td>
								<td class="align-middle">{{ $u->user->nik->address }}</td>
								<td class="align-middle text-center">
									@if($u->user->hasRole('Warga'))
									@else <span class="badge badge-dark">Non Warga</span>
									@endif
									@foreach ($u->user->getRoleNames() as $role) 
									<span class="badge badge-primary">{{ $role }}</span>
									@endforeach
								</td>
								<td class="align-middle text-center">
                                    @if(!empty($u->user->warga_kurang_mampu))
									<span class="badge badge-dark">Kurang Mampu</span>
                                    @else
                                    -
                                    @endif
								</td>
								<td class="align-middle text-center">
									<form action="{{ route('penduduk.destroy', $u->user->id) }}" method="POST">
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

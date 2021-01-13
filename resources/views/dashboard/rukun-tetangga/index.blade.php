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
			@if (count($rt) > 0)
			<div class="row">
                <div class="col-md-2">
					<div class="card">
						<div class="card-body text-center">
                            @can('rukun-tetangga-create')
							<a class="btn btn-success btn-block" href="{{ route('rt.create') }}">Create New</a>
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
										<th width="10%">Dusun</th>
										<th width="5%">RW</th>
										<th width="5%">RT</th>
										<th width="15%">Ketua RT</th>
										<th width="10%" class="text-center">Jenis Kelamin</th>
										<th width="20%">Alamat</th>
										<th width="20%" class="text-center">Status Penduduk</th>
										<th width="10%" class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($rt as $no => $r)
									<tr>
										<td class="align-middle text-center">{{ $no+1+(($rt->currentpage()-1)*10) }}</td>
										<td class="align-middle ">{{ $r->rukun_warga->dusun->name }}</td>
										<td class="align-middle ">{{ $r->rukun_warga->number }}</td>
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
												<a href="{{ route('rt.edit', $r->id) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
												<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-delete" data-title="Hapus RT" data-note="Anda akan menghapus RT {{$r->number}} dari RW {{$r->rukun_warga->number}} di Dusun {{$r->rukun_warga->dusun->name}}." data-url="{{ route('rt.destroy', $r->id) }}"><i class="fas fa-trash"></i></button>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					{{ $rt->links('layouts.pagination') }}
                </div>
			</div>
			@else
			<div class="row justify-content-center no-result">
				<img src="{{ asset('img/no-results.gif')}}" alt="">
			</div>
			@if(auth()->user()->can('rukun-tetangga-create'))
			<div class="row justify-content-center">
				<a href="{{ route('rt.create') }}" class="btn btn-success">Create New</a>
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

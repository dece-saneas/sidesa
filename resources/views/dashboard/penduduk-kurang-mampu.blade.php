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
            @if (count($user) > 0)
			<div class="row">
                <div class="col-md-2">
					<div class="card">
						<div class="card-body text-center">
							<a class="btn btn-success btn-block" href="{{ route('penduduk.create') }}">Add New</a>
							<a class="btn btn-default btn-block" href="{{ route('penduduk') }}">Refresh</a>
						</div>
                	</div>
					<div class="card">
						<div class="card-body">
							<form action="{{ route('penduduk.filter.kurangmampu') }}" method="POST">
                            @csrf
								<div class="form-group">
									<select class="form-control selectType" name="filter" id="filter">
                                        <option></option>
                                        <option value="All">Semua</option>
                                        <option value="Kurang Mampu" selected>Kurang Mampu</option>
                                    </select>
								</div>
								<button type="submit" class="btn btn-primary btn-block">Apply Filter</button>
							</form>
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
                                        <td class="align-middle ">{{ $u->nik->code }}</td>
                                        <td class="align-middle">{{ $u->name }}</td>
                                        <td class="align-middle text-center">{{ $u->nik->gender }}</td>
                                        <td class="align-middle">{{ $u->nik->address }}</td>
                                        <td class="align-middle text-center">
                                            @if($u->hasRole('Warga'))
                                            @else <a href="{{ route('penduduk.toggle.warga', $u->id) }}"><span class="badge badge-dark">Non Warga</span></a>
                                            @endif
                                            @foreach ($u->getRoleNames() as $role) 
                                            @if($role == 'Warga')
                                            <a href="{{ route('penduduk.toggle.warga', $u->id) }}"><span class="badge badge-primary">Warga</span></a>
                                            @else
                                            <span class="badge badge-primary">{{ $role }}</span>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('penduduk.toggle.kurangmampu', $u->id) }}"><span class="badge @if(!empty($u->warga_kurang_mampu)) badge-dark @else badge-primary @endif">@if(!empty($u->warga_kurang_mampu)) Kurang Mampu @else Mampu @endif</span></a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="btn-group" role="group">
                                                <a href="#" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-delete" data-title="Hapus Penduduk" data-note="Anda akan menghapus {{$u->name}}." data-url="{{ route('penduduk.destroy', $u->id) }}"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
						</div>
					</div>
					{{ $user->links('layouts.pagination') }}
                </div>
			</div>
			@else
			<div class="row justify-content-center no-result">
				<img src="{{ asset('img/no-results.gif')}}" alt="">
			</div>
			@if(auth()->user()->can('penduduk-create'))
			<div class="row justify-content-center">
				<a href="{{ route('penduduk.create') }}" class="btn btn-success">Create New</a>
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

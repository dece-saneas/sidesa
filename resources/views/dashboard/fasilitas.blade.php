@extends('layouts.master')
@section('title') Fasilitas @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Fasilitas</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Fasilitas</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
    <section class="content pb-4">
        <div class="container-fluid ">
            @if (count($fasilitas) > 0)
			<div class="row">
                <div class="col-md-2">
					<div class="card">
						<div class="card-body text-center">
							<a class="btn btn-default btn-block" href="{{ route('facilities')  }}">Refresh</a>
						</div>
                	</div>
					<div class="card">
						<div class="card-body">
							<form action="{{ route('facilities.store') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Fasilitas">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
								<div class="form-group">
									<select class="form-control selectType @error('category') is-invalid @enderror" name="category">
                                        <option></option>
                                        <option value="pendidikan">Pendidikan</option>
                                        <option value="kesehatan">Kesehatan</option>
                                        <option value="transportasi">Transportasi</option>
                                        <option value="ibadah">Tempat Ibadah</option>
                                        <option value="olahraga">Sarana Olahraga</option>
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<button type="submit" class="btn btn-success btn-block">Add New</button>
							</form>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<form action="{{ route('facilities.filter') }}" method="POST">
                            @csrf
								<div class="form-group">
									<select class="form-control selectType @error('filter') is-invalid @enderror" name="filter">
                                        <option></option>
                                        <option value="pendidikan">Pendidikan</option>
                                        <option value="kesehatan">Kesehatan</option>
                                        <option value="transportasi">Transportasi</option>
                                        <option value="ibadah">Tempat Ibadah</option>
                                        <option value="olahraga">Sarana Olahraga</option>
                                    </select>
                                    @error('filter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<button type="submit" class="btn btn-primary btn-block">Apply Filter</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-10">
					<div class="card">
						<div class="card-body table-responsive">
							<table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%" class="text-center">No</th>
                                        <th style="width: 55%">Nama Failisas</th>
                                        <th style="width: 30%" class="text-center">Category</th>
                                        <th style="width: 10%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fasilitas as $no => $f)
                                    <tr>
                                        <td class="text-center align-middle">1</td>
                                        <td>{{ $f->name }}</td>
                                        <td class="text-center align-middle"><span class="badge badge-light">{{ $f->type }}</span></td>
                                        <td class="text-center align-middle">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-delete" data-title="Hapus Fasilitas" data-note="Anda akan menghapus {{$f->name}}." data-url="{{ route('facilities.destroy', $f->id) }}"><i class="fas fa-trash"></i></button>
											</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
						</div>
					</div>
                    {{ $fasilitas->links('layouts.pagination') }}
                </div>
			</div>
			@else
			<div class="row justify-content-center no-result">
				<img src="{{ asset('img/no-results.gif')}}" alt="">
			</div>			
			@endif
        </div>
    </section>
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
@endsection

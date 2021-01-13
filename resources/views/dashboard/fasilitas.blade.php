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
            <div class="card">
                <div class="card-body p-0 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%" class="text-center">No</th>
                                <th style="width: 55%">Nama Failisas</th>
                                <th style="width: 30%" class="text-center">Category</th>
                                <th style="width: 10%"></th>
                            </tr>
                        </thead>
                        <tbody>
							@foreach ($fasilitas as $no => $f)
                            <tr>
                                <td class="text-center align-middle">1</td>
                                <td>{{ $f->name }}</td>
                                <td class="text-center align-middle"><span class="badge badge-light">{{ $f->type }}</span></td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('visimisi.edit', 1) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
							@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $fasilitas->links('layouts.pagination') }}
            @else
            <div class="row justify-content-center no-result">
                <img src="{{ asset('img/no-results.gif')}}" alt="">
            </div>
			@can('article-create')
            <div class="row justify-content-center">
                <a href="{{ route('article.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Create New</a>
            </div>
			@endcan
            @endif
        </div>
    </section>
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
@endsection

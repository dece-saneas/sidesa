@extends('layouts.master')
@section('title') Aparatur @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Aparatur</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Aparatur</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
    <section class="content pb-4">
        <div class="container-fluid ">
            @if (count($aparatur) > 0)
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a href="{{ route('aparatur.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Create New</a>
                    </div>
                    <a href="" class="btn btn-default"><i class="fas fa-sync-alt mr-2"></i>Refresh</a>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%" class="text-center">No</th>
                                <th style="width: 10%" class="text-center">Image</th>
                                <th style="width: 35%">Nama</th>
                                <th style="width: 40%" class="text-center">Jabatan</th>
                                <th style="width: 10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aparatur as $no => $a)
                            <tr>
                                <td class="text-center align-middle">{{ $no+1+(($aparatur->currentpage()-1)*10) }}</td>
                                <td class="align-middle"><img src="{{ asset('img/aparatur/'.$a->image) }}" alt="Article Image" class="img-thumbnail img-fluid"></td>
                                <td class="align-middle">{{ $a->name }}</td>
                                <td class="align-middle text-center">{{ $a->position }}</td>
                                <td class="text-center align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('aparatur.edit', $a->id) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-delete" data-title="Delete Aparatur!" data-note="This process cannot be undone." data-url="{{ route('aparatur.destroy', $a->id) }}"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $aparatur->links('layouts.pagination') }}
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

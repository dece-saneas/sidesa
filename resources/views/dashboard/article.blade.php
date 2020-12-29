@extends('layouts.master')
@section('title') Article @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Article</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Article</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
    
    <section class="content">
        <div class="container-fluid">
            @if (count($article) > 0)
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
						@can('article-create')
                        <a href="{{ route('article.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Create New</a>
						@endcan
                    </div>
                    <a href="" class="btn btn-default"><i class="fas fa-sync-alt mr-2"></i>Refresh</a>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%" class="text-center">No</th>
                                <th style="width: 10%" class="text-center">Foto</th>
                                <th style="width: 20%">Penulis</th>
                                <th style="width: 45%">Judul Artikel</th>
                                <th style="width: 10%" class="text-center">Status</th>
                                <th style="width: 10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($article as $no => $a)
                            <tr>
                                <td class="text-center align-middle">{{ $no+1+(($article->currentpage()-1)*10) }}</td>
                                <td class="align-middle"><img src="{{ asset('img/article/'.$a->image) }}" alt="Article Image" class="img-thumbnail img-fluid"></td>
                                <td class="align-middle">{{ $a->user->name }}<br/><small>Created {{ $a->created_at->format('d/F/Y') }}</small></td>
                                <td class="align-middle">{{ Str::limit($a->title, 80) }}</td>
                                <td class="text-center align-middle"><span class="badge badge-dark">{{ $a->status }}</span></td>
                                <td class="text-center align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('article.show', Crypt::encrypt($a->id)) }}" class="btn btn-default"><i class="fas fa-eye"></i></a>
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-delete" data-title="Delete Article!" data-note="This process cannot be undone." data-url="{{ route('article.destroy', $a->id) }}"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $article->links('layouts.pagination') }}
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

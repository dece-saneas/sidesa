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
	<div class="content pb-4">
		<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <a class="btn btn-success btn-block" href="{{ route('article.create') }}">Add New</a>
                            <a class="btn btn-default btn-block" href="{{ route('article') }}">Refresh</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    @if (count($article) > 0)
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%" class="text-center">No</th>
                                        <th width="5%">Image</th>
                                        <th width="60%">Title</th>
                                        <th width="10%" class="text-center">Created</th>
                                        <th width="10%" class="text-center">Status</th>
                                        <th width="10%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($article as $no => $a)
                                    <tr>
                                        <td class="align-middle text-center">{{ $no+1+(($article->currentpage()-1)*10) }}</td>
                                        <td class="align-middle "><img src="{{ asset('img/article/'.$a->image) }}" alt="Article Image" class="img-thumbnail img-fluid"></td>
                                        <td class="align-middle">{{ Str::limit($a->title, 80) }}</td>
                                        <td class="align-middle text-center">{{ $a->created_at->format('F d, Y') }} <br> {{ $a->created_at->format('G:i') }} WIB</td>
                                        <td class="align-middle text-center">
                                            <span class="badge badge-dark">{{ $a->status }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('article.show', $a->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-delete" data-title="Delete Article" data-note="This process cannot be undone." data-url="{{ route('article.destroy', $a->id) }}"><i class="fas fa-trash"></i></button>
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
                    @endif
                </div>
            </div>
		</div>
	</div>
</div>
@endsection

@extends('layouts.master')
@section('title') Show Article @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Show Article</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('article')}}">Article</a></li>
						<li class="breadcrumb-item active" aria-current="page">Show Article</li>
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
                            <a class="btn btn-success btn-block" href="{{ route('article.create') }}">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2>{{ $article->title }}</h2>
                            <h6>By {{ $article->user->name }} / {{ $article->created_at->format('F d, Y') }} - {{ $article->created_at->format('G:i') }} WIB</h6>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('img/article/'.$article->image) }}" alt="Article Image" class="w-100 img-thumbnail">
                        </div>
                        <div class="card-body">
                            {!! $article->content !!}
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection

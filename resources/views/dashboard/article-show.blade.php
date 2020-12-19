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
                            @hasrole('Admin')
                            @if($article->status == 'In Review')
                            <a class="btn btn-default btn-block" href="{{ route('article.update.confirm', [$article->id, 'approve']) }}">Approve</a>
                            @elseif($article->status == 'Approved')
                            <a class="btn btn-default btn-block" href="{{ route('article.update.confirm', [$article->id, 'publish']) }}">Publish</a>
                            @elseif($article->status == 'Published')
                            <a class="btn btn-success btn-block" href="{{ route('article.update.confirm', [$article->id, 'approve']) }}">Published</a>
                            @endif
                            @endhasrole
                            @hasrole('Jurnalis')
                            @if($article->status == 'In Review')
                            <a class="btn btn-primary btn-block" href="{{ route('article.edit', $article->id) }}">Edit</a>
                            @elseif($article->status == 'Approved' || $article->status == 'Published')
                            <button class="btn btn-default btn-block" disabled>Edit</button>
                            @endif
                            @endhasrole
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header text-center">
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
                    @hasrole('Admin')
                    @if($article->status == 'In Review')
                    <div class="card">
                        <form action="{{ route('article.update.note', $article->id) }}" method="POST" enctype="multipart/form-data">
				        @csrf @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="note" class="col-sm-2 col-form-label">Note</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" placeholder="Write note for creator">{{ $article->note }}</textarea>
                                     @error('note')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                     @enderror
                                </div>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="card-body text-right">
                            <a href="{{ route('article') }}" class="btn btn-default mr-2">Cancel</a>
                            <button class="btn btn-success" type="submit">Send Note</button>
                        </div>
                        </form>
                    </div>
                    @endif
                    @endhasrole
                    @hasrole('Jurnalis')
                    @if($article->status == 'In Review')
                    <div class="card">
                        <div class="card-header text-center font-italic">
                            @if($article->note)
                            <strong>Admin</strong> : {{ $article->note }}
                            @else
                            Artikel anda belum di review
                            @endif
                        </div>
                    </div>
                    @endif
                    @endhasrole
                </div>
            </div>
		</div>
	</div>
</div>
@endsection

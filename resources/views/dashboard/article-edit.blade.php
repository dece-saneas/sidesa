@extends('layouts.master')
@section('title') Edit Article @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Edit Article</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('article')}}">Article</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container">
            <div class="card">
				<form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
				@csrf @method('PUT')
                    <div class="card-header">
                    <strong>Edit Article</strong>
                    </div>
					<div class="card-body">
                         <div class="form-group row">
                             <label for="title" class="col-sm-2 col-form-label">Title</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Article Title" name="title" value="{{ $article->title }}">
                                 @error('title')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('content') is-invalid @enderror" id="summernote" name="content">{!! $article->content !!}</textarea>
                                 @error('content')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10 d-none">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="file-article" onchange="readImageArticle(this);" name="image">
                                    <label class="custom-file-label" for="file-article">Choose file</label>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <img src="{{ asset('img/article/'. $article->image) }}" alt="Article Image" class="img-fluid img-thumbnail w-100 img-article" id="upfile-article" style="cursor:pointer; width: 795px; height: 586px" >
                                <small id="imageHelp" class="form-text text-muted mt-2">The recommended image size is 795 x 586 pixels. Maximum upload file size: 2MB.</small>
                                @error('image')
                                <small id="imageHelp" class="form-text text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
					</div>
                    <hr class="m-0">
                    <div class="card-body text-right">
                        <a href="{{ route('article.show', $article->id) }}" class="btn btn-default mr-2">Cancel</a>
                        <button class="btn btn-success" type="submit" name="create" value="create">Update Article</button>
					</div>
				</form>
            </div>
		</div>
	</div>
</div>
@endsection

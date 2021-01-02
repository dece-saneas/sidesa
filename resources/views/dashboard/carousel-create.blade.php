@extends('layouts.master')
@section('title') Create Carousel @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Create Carousel</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('carousel')}}">Carousel</a></li>
						<li class="breadcrumb-item active" aria-current="page">Create</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container">
            <div class="card card-primary card-outline">
				<form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
					<div class="card-body">
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10 d-none">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="file-article" onchange="readImageArticle(this);" name="image">
                                    <label class="custom-file-label" for="file-article">Choose file</label>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <img src="{{ asset('img/carousels/placeholder.jpg') }}" alt="Article Image" class="img-fluid img-thumbnail w-100 img-article" id="upfile-article" style="cursor:pointer; width: 1760px; height: 500px" >
                                <small id="imageHelp" class="form-text text-muted mt-2">The recommended image size is 1760 x 900 pixels. Maximum upload file size: 2MB.</small>
                                @error('image')
                                <small id="imageHelp" class="form-text text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('content') is-invalid @enderror" id="summernote" name="content"></textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="card-body">
                        <div class="float-right">
                            <button class="btn btn-success" type="submit" name="create" value="create"><i class="fas fa-plus mr-2"></i>Create Carousel</button>
                        </div>
                        <a href="{{ route('carousel') }}" class="btn btn-default"><i class="fas fa-times mr-2"></i>Cancel</a>
                    </div>
				</form>
            </div>
		</div>
	</div>
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
@endsection

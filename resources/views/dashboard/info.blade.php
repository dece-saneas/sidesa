@extends('layouts.master')
@section('title') Info @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Info</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Info</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container">
            <div class="card card-primary card-outline">
				<form action="{{ route('info.update') }}" method="POST" enctype="multipart/form-data">
				@csrf @method('PUT')
					<div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <h4>Seputar {{ $glo['data'][0]->A }}</h4>
                                <h2>Info Terbaru Provinsi {{ $glo['data'][0]->A }}</h2>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="summernote" name="content">{{ $glo['data'][2]->B }}</textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 d-none">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="file-article" onchange="readImageArticle(this);" name="image">
                                    <label class="custom-file-label" for="file-article">Choose file</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('img/info/'.$glo['data'][2]->A) }}" alt="Article Image" class="img-fluid img-thumbnail w-100 img-article" id="upfile-article" style="cursor:pointer; width: 855px; height: 371px" >
                                <small id="imageHelp" class="form-text text-muted mt-2">The recommended image size is 855 x 571 pixels. Maximum upload file size: 2MB.</small>
                                @error('image')
                                <small id="imageHelp" class="form-text text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="card-body">
                        <div class="float-right">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save mr-2"></i>Save</button>
                        </div>
                        <a href="{{ route('info') }}" class="btn btn-default"><i class="fas fa-sync-alt mr-2"></i>Refresh</a>
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

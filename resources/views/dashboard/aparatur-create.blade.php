@extends('layouts.master')
@section('title') Create Aparatur @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Create Aparatur</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('aparatur')}}">Aparatur</a></li>
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
				<form action="{{ route('aparatur.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
					<div class="card-body">
                        <div class="form-row">
							<div class="col-lg-6">
                                <div class="col d-none">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="file-article" onchange="readImageArticle(this);" name="image">
                                        <label class="custom-file-label" for="file-article">Choose file</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <img src="{{ asset('img/aparatur/placeholder.jpg') }}" alt="Article Image" class="img-fluid img-thumbnail w-100 img-article" id="upfile-article" style="cursor:pointer; width: 420px; height: 620px" >
                                    <small id="imageHelp" class="form-text text-muted mt-2">The recommended image size is 420 x 520 pixels. Maximum upload file size: 2MB.</small>
                                    @error('image')
                                    <small id="imageHelp" class="form-text text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
							</div>
							<div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="position">Jabatan</label>
                                    <input type="text" class="form-control" id="position" name="position">
                                </div>
							</div>
						</div>
                    </div>
                    <hr class="m-0">
                    <div class="card-body">
                        <div class="float-right">
                            <button class="btn btn-success" type="submit" name="create" value="create"><i class="fas fa-plus mr-2"></i>Create Aparatur</button>
                        </div>
                        <a href="{{ route('aparatur') }}" class="btn btn-default"><i class="fas fa-times mr-2"></i>Cancel</a>
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

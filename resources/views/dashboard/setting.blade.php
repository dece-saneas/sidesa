@extends('layouts.master')
@section('title') Create Article @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Settings</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Settings</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container">
            <div class="card card-primary card-outline">
				<form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
					<div class="card-body">
						<div class="form-row">
							<div class="col-lg-4">
								<div class="form-group row">
									<label for="title" class="col-sm-4 col-form-label">Nama Desa</label>
									<div class="col-sm-8">
										<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $glo['data'][0]->F }}">
										@error('title')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group row">
									<label for="title" class="col-sm-4 col-form-label">Provinsi</label>
									<div class="col-sm-8">
										<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $glo['data'][0]->A }}">
										@error('title')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group row">
									<label for="title" class="col-sm-4 col-form-label">Kabupaten</label>
									<div class="col-sm-8">
										<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $glo['data'][0]->C }}">
										@error('title')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-4">
								<div class="form-group row">
									<label class="col-sm-4"></label>
									<div class="col-sm-8 d-none">
										<div class="custom-file">
											<input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="file-article" onchange="readImageArticle(this);" name="image">
											<label class="custom-file-label" for="file-article">Choose file</label>
										</div>
									</div>
									<div class="col-sm-8">
										<img src="{{ asset('img/logo/'.$glo['data'][0]->G) }}" alt="Article Image" class="img-fluid img-thumbnail" id="upfile-article" style="cursor:pointer; width: 128px; height: 128px" >
										<small id="imageHelp" class="form-text text-muted mt-2">The recommended image size is 128 x 128 pixels. Maximum upload file size: 2MB.</small>
										@error('image')
										<small id="imageHelp" class="form-text text-danger mt-2">{{ $message }}</small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group row">
									<label class="col-sm-4"></label>
									<div class="col-sm-8 d-none">
										<div class="custom-file">
											<input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="file-article" onchange="readImageArticle(this);" name="image">
											<label class="custom-file-label" for="file-article">Choose file</label>
										</div>
									</div>
									<div class="col-sm-8">
										<img src="{{ asset('img/logo/'.$glo['data'][0]->B) }}" alt="Article Image" class="img-fluid img-thumbnail" id="upfile-article" style="cursor:pointer; width: 300px; height: 200px" >
										<small id="imageHelp" class="form-text text-muted mt-2">The recommended image size is 300 x 200 pixels. Maximum upload file size: 2MB.</small>
										@error('image')
										<small id="imageHelp" class="form-text text-danger mt-2">{{ $message }}</small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group row">
									<label class="col-sm-4"></label>
									<div class="col-sm-8 d-none">
										<div class="custom-file">
											<input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="file-article" onchange="readImageArticle(this);" name="image">
											<label class="custom-file-label" for="file-article">Choose file</label>
										</div>
									</div>
									<div class="col-sm-8">
										<img src="{{ asset('img/logo/'.$glo['data'][0]->D) }}" alt="Article Image" class="img-fluid img-thumbnail" id="upfile-article" style="cursor:pointer; width: 300px; height: 200px" >
										<small id="imageHelp" class="form-text text-muted mt-2">The recommended image size is 300 x 200 pixels. Maximum upload file size: 2MB.</small>
										@error('image')
										<small id="imageHelp" class="form-text text-danger mt-2">{{ $message }}</small>
										@enderror
									</div>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col">
								<div class="form-group row">
									<label for="title" class="col-sm-2 col-form-label">Kecamatan</label>
									<div class="col-sm-10">
										<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $glo['data'][0]->E }}">
										@error('title')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="form-row">
							<div class="col">
								<div class="form-group row">
									<label for="title" class="col-sm-2 col-form-label">Maps</label>
									<div class="col-sm-10">
										<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $glo['data'][1]->A }}">
										@error('title')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="form-row">
							<div class="col-lg-4">
								<div class="form-group row">
									<label for="title" class="col-sm-4 col-form-label">Operational</label>
									<div class="col-sm-8">
										<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $glo['data'][1]->B }}">
										@error('title')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group row">
									<label for="title" class="col-sm-4 col-form-label">Phone</label>
									<div class="col-sm-8">
										<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $glo['data'][1]->C }}">
										@error('title')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group row">
									<label for="title" class="col-sm-4 col-form-label">Email</label>
									<div class="col-sm-8">
										<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $glo['data'][1]->D }}">
										@error('title')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
							
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Article Title" name="title">
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
                            <button class="btn btn-success mr-2" type="submit"><i class="fas fa-save mr-2"></i>Save</button>
                        </div>
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

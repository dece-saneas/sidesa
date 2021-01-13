@extends('layouts.master')
@section('title') Profil Desa @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Profil Desa</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Profil Desa</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container">
            <div class="card card-primary card-outline">
				<form action="{{ route('profile-desa.update') }}" method="POST">
				@csrf @method('PUT')
					<div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea class="form-control @error('content') is-invalid @enderror" id="summernote" name="content">{{ $glo['data'][2]->D }}</textarea>
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
                            <button class="btn btn-success" type="submit"><i class="fas fa-save mr-2"></i>Save</button>
                        </div>
                        <a href="" class="btn btn-default"><i class="fas fa-sync-alt mr-2"></i>Refresh</a>
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

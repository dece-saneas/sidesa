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
				<form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
				@csrf @method('PUT')
					<div class="card-body">
                        <div class="form-row">
							<div class="col-lg-5">
								<div class="form-group row">
									<label for="desa" class="col-sm-6 col-form-label">Nama Desa</label>
									<div class="col-sm-6">
										<input type="text" class="form-control @error('desa') is-invalid @enderror" id="desa" name="desa" value="{{ $glo['data'][0]->F }}">
										@error('desa')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-lg-5 offset-lg-2">
								<div class="form-group row">
									<label for="logo_desa" class="col-sm-6 col-form-label">Logo Desa</label>
									<div class="col-sm-6">
										<div class="custom-file">
											<input type="file" class="custom-file-input @error('logo_desa') is-invalid @enderror" id="logo_desa" name="logo_desa">
											<label class="custom-file-label" for="logo_desa">Choose file</label>
										</div>
                                        @error('logo_desa')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
                        <div class="form-row">
							<div class="col-lg-5">
								<div class="form-group row">
									<label for="provinsi" class="col-sm-6 col-form-label">Provinsi</label>
									<div class="col-sm-6">
										<input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" value="{{ $glo['data'][0]->A }}">
										@error('provinsi')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-lg-5 offset-lg-2">
								<div class="form-group row">
									<label for="logo_provinsi" class="col-sm-6 col-form-label">Logo Provinsi</label>
									<div class="col-sm-6">
										<div class="custom-file">
											<input type="file" class="custom-file-input @error('logo_provinsi') is-invalid @enderror" id="logo_provinsi"  name="logo_provinsi">
											<label class="custom-file-label" for="logo_provinsi">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="form-row">
							<div class="col-lg-5">
								<div class="form-group row">
									<label for="kabupaten" class="col-sm-6 col-form-label">Kabupaten</label>
									<div class="col-sm-6">
										<input type="text" class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten" value="{{ $glo['data'][0]->C }}">
										@error('kabupaten')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-lg-5 offset-lg-2">
								<div class="form-group row">
									<label for="logo_kabupaten" class="col-sm-6 col-form-label">Logo Kabupaten</label>
									<div class="col-sm-6">
										<div class="custom-file">
											<input type="file" class="custom-file-input @error('logo_kabupaten') is-invalid @enderror" id="logo_kabupaten" name="logo_kabupaten">
											<label class="custom-file-label" for="logo_kabupaten">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="form-row">
							<div class="col-lg-5">
								<div class="form-group row">
									<label for="kecamatan" class="col-sm-6 col-form-label">Kecamatan</label>
									<div class="col-sm-6">
										<input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" value="{{ $glo['data'][0]->E }}">
										@error('kecamatan')
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
							<div class="col-lg-5">
								<div class="form-group row">
									<label for="maps" class="col-sm-6 col-form-label">Maps</label>
									<div class="col-sm-6">
										<input type="text" class="form-control @error('maps') is-invalid @enderror" id="maps" name="maps" value="{{ $glo['data'][1]->A }}">
										@error('maps')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-lg-5 offset-lg-2">
								<div class="form-group row">
									<label for="operational" class="col-sm-6 col-form-label">Operational Hours</label>
									<div class="col-sm-6">
										<input type="text" class="form-control @error('operational') is-invalid @enderror" id="operational" name="operational" value="{{ $glo['data'][1]->B }}">
										@error('operational')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
                        <div class="form-row">
							<div class="col-lg-5">
								<div class="form-group row">
									<label for="phone" class="col-sm-6 col-form-label">Phone</label>
									<div class="col-sm-6">
										<input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $glo['data'][1]->C }}">
										@error('phone')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-lg-5 offset-lg-2">
								<div class="form-group row">
									<label for="email" class="col-sm-6 col-form-label">Email</label>
									<div class="col-sm-6">
										<input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $glo['data'][1]->D }}">
										@error('email')
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
							<div class="col-lg-5">
								<div class="form-group row">
									<label for="facebook" class="col-sm-6 col-form-label">Facebook</label>
									<div class="col-sm-6">
										<input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ $glo['data'][1]->E }}">
										@error('facebook')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-lg-5 offset-lg-2">
								<div class="form-group row">
									<label for="twitter" class="col-sm-6 col-form-label">Twitter</label>
									<div class="col-sm-6">
										<input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" value="{{ $glo['data'][1]->F }}">
										@error('twitter')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
                        <div class="form-row">
							<div class="col-lg-5">
								<div class="form-group row">
									<label for="instagram" class="col-sm-6 col-form-label">Instagram</label>
									<div class="col-sm-6">
										<input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ $glo['data'][1]->G }}">
										@error('instagram')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="card-body">
                        <div class="float-right">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save mr-2"></i>Save</button>
                        </div>
                        <a href="{{ route('setting') }}" class="btn btn-default"><i class="fas fa-sync-alt mr-2"></i>Refresh</a>
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

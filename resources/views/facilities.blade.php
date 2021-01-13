@extends('layouts.master-frontend')

@section('title') Fasilitas @endsection

@section('content')
<div class="inner-banner">
    <section class="w3l-breadcrumb py-5">
        <div class="container py-lg-5 py-md-3">
            <h2 class="title">Fasilitas</h2>
        </div>
    </section>
</div>
<div class="position-relative">
	<div class="shape overflow-hidden">
		<svg viewBox="0 0 2880 48" fill="none" xmlns="">
			<path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
		</svg>
	</div>
</div>
<section class="w3-services-ab py-5" id="mission">
    <div class="container py-lg-5 py-md-4">
        <div class="w3-services-grids">
            <div class="fea-gd-vv row">
                <div class="col-lg-4 col-md-6">
                    <div class="float-lt feature-gd">
                        <div class="icon">
                            <h2><i class="fas fa-user-graduate"></i></h2>
                        </div>
                        <div class="icon-info">
                            <h5>Pendidikan</h5>
                            <ul>
								@foreach ($fasilitas as $no => $f)
								@if($f->type == 'pendidikan')
								<li>{{ $f->name }}</li>
								@endif
								@endforeach
							</ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                    <div class="float-mid feature-gd">
                        <div class="icon">
                            <h2><i class="fas fa-hospital"></i></h2>
                        </div>
                        <div class="icon-info">
                            <h5>Kesehatan</h5>
                            <ul>
								@foreach ($fasilitas as $no => $f)
								@if($f->type == 'kesehatan')
								<li>{{ $f->name }}</li>
								@endif
								@endforeach
							</ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                    <div class="float-rt feature-gd">
                        <div class="icon">
                            <h2><i class="fas fa-bus"></i></h2>
                        </div>
                        <div class="icon-info">
                            <h5>Transportasi</h5>
                            <ul>
								@foreach ($fasilitas as $no => $f)
								@if($f->type == 'transportasi')
								<li>{{ $f->name }}</li>
								@endif
								@endforeach
							</ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 pt-md-2">
                    <div class="float-lt feature-gd">
                        <div class="icon">
                            <h2><i class="fas fa-pray"></i></h2>
                        </div>
                        <div class="icon-info">
                            <h5>Tempat Ibadah</h5>
                            <ul>
								@foreach ($fasilitas as $no => $f)
								@if($f->type == 'ibadah')
								<li>{{ $f->name }}</li>
								@endif
								@endforeach
							</ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 pt-md-2">
                    <div class="float-mid feature-gd">
                        <div class="icon">
                            <h2><i class="fas fa-dumbbell"></i></h2>
                        </div>
                        <div class="icon-info">
                            <h5>Sarana Olahraga</h5>
                            <ul>
								@foreach ($fasilitas as $no => $f)
								@if($f->type == 'olahraga')
								<li>{{ $f->name }}</li>
								@endif
								@endforeach
							</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('layouts.master-frontend')

@section('title') Desa Blang Kolak II - Visi & Misi @endsection

@section('content')
<div class="inner-banner">
    <section class="w3l-breadcrumb py-5">
        <div class="container py-lg-5 py-md-3">
            <h2 class="title">Visi & Misi</h2>
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
<section class="w3l-aboutblock2" id="story">
	<div class="py-5">
		<div class="container py-lg-4 py-md-3">
			<div class="cwp4-two">
				<div class="cwp4-text">
					<h3 class="title-big">Visi</h3>
					<ul class="cont-4 mt-4">
						@foreach($visimisi as $no => $v)
						@if($v->id == 1)
						<li><span class="fa fa-check"></span>{{ $v->content}}</li>
						@endif
						@endforeach
					</ul>
				</div>
				<div class="cwp4-text mt-md-5 mt-4">
					<h3 class="title-big">Misi</h3>
					<ul class="cont-4 mt-4">
						@foreach($visimisi as $no => $v)
						@if($v->id > 1)
						<li><span class="fa fa-check"></span>{{ $v->content}}</li>
						@endif
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
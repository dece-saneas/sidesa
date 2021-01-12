@extends('layouts.master-frontend')

@section('title') {{ $glo['data'][0]->F }} - Sejarah @endsection

@section('content')
<div class="inner-banner">
    <section class="w3l-breadcrumb py-5">
        <div class="container py-lg-5 py-md-3">
            <h2 class="title">Sejarah</h2>
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
			<div class="single-post-content">
				{!! $glo['data'][2]->C !!}
            </div>
		</div>
	</div>
</section>
@endsection
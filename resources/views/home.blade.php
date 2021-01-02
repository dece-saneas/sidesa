@extends('layouts.master-frontend')

@section('title') Desa {{ $glo['data'][0]->F }} @endsection

@section('content')
<!-- main-slider -->
<section class="w3l-main-slider" id="home">
	<div class="companies20-content">
		<div class="owl-one owl-carousel owl-theme">
            @foreach ($carousel as $no => $c)
			<div class="item">
				<li>
					<div class="slider-info banner-view" style="background: url({{ asset('img/carousels/'.$c->image) }}) no-repeat center; background-size: cover;">
						<div class="banner-info">
							<div class="container">
								<div class="banner-info-bg text-left">
									{!! $c->content !!}
									<a href="#contact" class="btn btn-primary btn-style">Hubungi kami</a>
								</div>
							</div>
						</div>
					</div>
				</li>
			</div>
            @endforeach
		</div>
	</div>
</section>
<div class="position-relative">
	<div class="shape overflow-hidden">
		<svg viewBox="0 0 2880 48" fill="none" xmlns="#">
			<path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
		</svg>
	</div>
</div>
<!-- main-menu -->
<section class="homeblock1">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="box-wrap">
					<h4><a href="#news">Artikel terbaru</a></h4>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 mt-md-0 mt-sm-4 mt-3">
				<div class="box-wrap">
					<h4><a href="#stats">Informasi Covid-19</a></h4>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-sm-4 mt-3">
				<div class="box-wrap">
					<h4><a href="#footer">Hubungi kami</a></h4>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="middle py-5">
</div>
<!-- Covid-19 -->
<section class="w3_stats py-5" id="stats">
	<div class="container py-lg-5 py-md-4 py-2">
		<div class="title-content text-center">
			<h3 class="title-big">Statistik Kasus Coronavirus di Provinsi Aceh.</h3>
		</div>
		<div class="w3-stats text-center">
			<div class="row">
				<div class="col-md-4 col-12">
					<div class="counter">
						<span class="fa fa-procedures"></span>
						<div class="timer count-title count-number mt-3" data-to="{{ $covid['Kasus_Posi'] }}" data-speed="1000"></div>
						<p class="count-text ">Total Positif</p>
					</div>
				</div>
				<div class="col-md-4 col-12">
					<div class="counter">
						<span class="fa fa-heartbeat"></span>
						<div class="timer count-title count-number mt-3" data-to="{{ $covid['Kasus_Semb'] }}" data-speed="1000"></div>
						<p class="count-text ">Total Sembuh</p>
					</div>
				</div>
				<div class="col-md-4 col-12">
					<div class="counter">
						<span class="fa fa-sad-tear"></span>
						<div class="timer count-title count-number mt-3" data-to="{{ $covid['Kasus_Meni'] }}" data-speed="1000"></div>
						<p class="count-text ">Total Meninggal</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Artikel -->
<section class="w3l-index5 py-5" id="news">
	<div class="container py-lg-5 py-md-4">
		<div class="row">
			<div class="@if (count($article) > 0) col-lg-4 @else col text-center @endif">
				<div class="@if (count($article) > 0) header-section @endif">
					<h3 class="title-big">Artikel Desa</h3>
					<h4>Terbaru! artikel terbaik dan tervalid dari <a href="#url">Jurnalis Desa.</a></h4>
					<p class="mt-3 mb-lg-5 mb-4">Desa {{ $glo['data'][0]->F }} menghadirkan beragam Artikel terbaru dan tervalid langsung dari jurnalis desa yang telah terverifikasi oleh aparatur desa. Ingin bergabung menjadi <strong>Jurnalis Desa ?</strong></p>
				</div>
				<a href="#footer" class="btn btn-outline-primary btn-style">Daftar Jurnalis</a>
			</div>
            @if (count($article) > 0)
            <div class="col-lg-8 mt-lg-0 mt-5">
                <div class="row">
                    <div class="col-md-6">
                        @foreach ($article as $no => $a)
                        @if($a->id%2 == 0)
                        <div class="img-block mb-4">
                            <a href="{{ route('article.show', $a->id) }}">
                                <img src="{{ asset('img/article/'.$a->image) }}" class="img-fluid radius-image-full" alt="image" />
                                <span class="title">{{ $a->title }}</span>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        @foreach ($article as $no => $a)
                        @if($a->id%2 == 1)
                        <div class="img-block mb-4">
                            <a href="{{ route('article.show', $a->id) }}">
                                <img src="{{ asset('img/article/'.$a->image) }}" class="img-fluid radius-image-full" alt="image" />
                                <span class="title">{{ $a->title }}</span>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
		</div>
	</div>
</section>
<!-- aparatur -->
<section class="w3l-team-main" id="team">
	<div class="team py-5">
		<div class="container py-lg-5">
			<div class="title-content text-center">
				<h3 class="title-big">Aparatur Desa</h3>
			</div>
			<div class="team-row mt-md-5 mt-4">
                @foreach ($aparatur as $no => $a)
				<div class="team-wrap">
					<div class="team-member text-center">
						<div class="team-img">
							<img src="{{ asset('img/aparatur/'.$a->image) }}" alt="" class="radius-image img-fluid">
						</div>
						<a href="#url" class="team-title">{{ $a->name }}</a>
						<p>{{ $a->position }}</p>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</div>
</section>
<!-- seputar aceh -->
<section class="w3l-aboutblock1 py-5" id="about">
	<div class="container py-lg-5 py-md-3">
		<div class="row">
			<div class="col-lg-6">
				<h5 class="title-small">Seputar {{ $glo['data'][0]->A }}</h5>
				<h3 class="title-big">Info Terbaru Provinsi {{ $glo['data'][0]->A }}</h3>
				<p class="mt-3">{!! $glo['data'][2]->B !!}</p>
			</div>
			<div class="col-lg-6 mt-lg-0 mt-5">
				<img src="{{ asset('img/info/'. $glo['data'][2]->A ) }}" alt="" class="radius-image img-fluid">
			</div>
		</div>
	</div>
</section>
<!-- Covid-19 -->
<section class="w3_stats py-5" id="stats">
	<div class="container py-lg-5 py-md-4 py-2">
		<div class="title-content text-center">
			<h3 class="title-big">Statistik Pengunjung website.</h3>
			<h4 class="title-big">Desa {{ $glo['data'][0]->F }}.</h4>
		</div>
		<div class="w3-stats text-center">
			<div class="row">
				<div class="col-md-4 col-12">
					<div class="counter">
						<span class="fa fa-globe-asia"></span>
						<div class="timer count-title count-number mt-3" data-to="{{ count($visitor['day']) }}" data-speed="@if(count($visitor['year']) > 0) {{ count($visitor['year']) }} @else 1 @endif"></div>
						<p class="count-text ">Hari ini</p>
					</div>
				</div>
				<div class="col-md-4 col-12">
					<div class="counter">
						<span class="fa fa-globe-asia"></span>
						<div class="timer count-title count-number mt-3" data-to="{{ count($visitor['month']) }}" data-speed="@if(count($visitor['year']) > 0) {{ count($visitor['year']) }} @else 1 @endif"></div>
						<p class="count-text ">Bulan ini</p>
					</div>
				</div>
				<div class="col-md-4 col-12">
					<div class="counter">
						<span class="fa fa-globe-asia"></span>
						<div class="timer count-title count-number mt-3" data-to="{{ count($visitor['year']) }}" data-speed="@if(count($visitor['year']) > 0) {{ count($visitor['year']) }} @else 1 @endif"></div>
						<p class="count-text ">Tahun ini</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- logo -->
<section class="w3l-clients py-5" id="clients">
	<div class="call-w3 py-lg-5 py-md-4">
		<div class="container">
			<h3 class="title-big text-center">Bekerja sama dengan : </h3>
			<div class="company-logos text-center mt-5">
				<div class="row logos justify-content-center">
					<div class="col-lg-2 col-md-3 col-4">
						<img src="{{ asset('img/logo/'. $glo['data'][0]->B ) }}" alt="" class="img-fluid mb-2">
						<p>Provinsi {{ $glo['data'][0]->A }}</p>
					</div>
					<div class="col-lg-2 col-md-3 col-4">
						<img src="{{ asset('img/logo/'. $glo['data'][0]->D ) }}" alt="" class="img-fluid mb-2">
						<p>Kabupaten {{ $glo['data'][0]->C }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- maps -->
<div class="map">
	<iframe src="{{ $glo['data'][1]->A }}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
@endsection
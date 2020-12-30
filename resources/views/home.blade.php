@extends('layouts.master-frontend')

@section('title') Desa {{ $glo['data'][0]->F }} @endsection

@section('content')
<!-- main-slider -->
<section class="w3l-main-slider" id="home">
	<div class="companies20-content">
		<div class="owl-one owl-carousel owl-theme">
			<div class="item">
				<li>
					<div class="slider-info banner-view" style="background: url({{ asset('img/carousels/carousel1.jpg') }}) no-repeat center; background-size: cover;">
						<div class="banner-info">
							<div class="container">
								<div class="banner-info-bg text-left">
									<p>Selamat datang di</p>
									<h5>Website Desa Blank Kolak II<br><span class="font-weight-lighter">Kec. Bebesan, Kab. Aceh Tengah</span></h5>
									<a href="#contact" class="btn btn-primary btn-style">Hubungi kami</a>
								</div>
							</div>
						</div>
					</div>
				</li>
			</div>
			<div class="item">
				<li>
					<div class="slider-info banner-view" style="background: url({{ asset('img/carousels/carousel2.jpg') }}) no-repeat center; background-size: cover;">
						<div class="banner-info">
							<div class="container">
								<div class="banner-info-bg text-left">
									<p>Selamat datang di</p>
									<h5>Website Desa Blank Kolak II<br><span class="font-weight-lighter">Kec. Bebesan, Kab. Aceh Tengah</span></h5>
									<a href="#contact" class="btn btn-primary btn-style">Hubungi kami</a>
								</div>
							</div>
						</div>
					</div>
				</li>
			</div>
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
			<div class="col-lg-4">
				<div class="header-section">
					<h3 class="title-big">Artikel Desa</h3>
					<h4>Terbaru! artikel terbaik dan tervalid dari <a href="#url">Jurnalis Desa.</a></h4>
					<p class="mt-3 mb-lg-5 mb-4">Desa {{ $glo['data'][0]->F }} menghadirkan beragam Artikel terbaru dan tervalid langsung dari jurnalis desa yang telah terverifikasi oleh aparatur desa. Ingin bergabung menjadi <strong>Jurnalis Desa ?</strong></p>
				</div>
				<a href="#footer" class="btn btn-outline-primary btn-style">Daftar Jurnalis</a>
			</div>
			<div class="col-lg-4 col-md-6 mt-lg-0 mt-5">
				<div class="img-block">
					<a href="#">
						<img src="{{ asset('img/news/news1.jpg') }}" class="img-fluid radius-image-full" alt="image" />
						<span class="title">Food for Hungry</span>
					</a>
				</div>
				<div class="img-block mt-4">
					<a href="#"> <img src="{{ asset('img/news/news2.jpg') }}" class="img-fluid radius-image-full" alt="image" />
						<span class="title">Help from Injuries</span>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mt-lg-0 mt-md-5 mt-4">
				<div class="img-block">
					<a href="#"> <img src="{{ asset('img/news/news3.jpg') }}" class="img-fluid radius-image-full" alt="image" />
						<span class="title">Education for all</span>
					</a>
				</div>
				<div class="img-block mt-4">
					<a href="#">
						<img src="{{ asset('img/news/news4.jpg') }}" class="img-fluid radius-image-full" alt="image" />
						<span class="title">Clean water for all</span>
					</a>
				</div>
			</div>
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
				<div class="team-wrap">
					<div class="team-member text-center">
						<div class="team-img">
							<img src="{{ asset('img/aparatur/aparatur1.jpg') }}" alt="" class="radius-image img-fluid">
						</div>
						<a href="#url" class="team-title">Padlika</a>
						<p>Kepala Kelurahan</p>
					</div>
				</div>
				<div class="team-wrap">
					<div class="team-member text-center">
						<div class="team-img">
							<img src="{{ asset('img/aparatur/aparatur2.jpg') }}" alt="" class="radius-image img-fluid">
						</div>
						<a href="#url" class="team-title">Hafiza</a>
						<p>Wakil Kelurahan</p>
					</div>
				</div>
				<div class="team-wrap">
					<div class="team-member text-center">
						<div class="team-img">
							<img src="{{ asset('img/aparatur/aparatur3.jpg') }}" alt="" class="radius-image img-fluid">
						</div>
						<a href="#url" class="team-title">Angga</a>
						<p>Sekretaris</p>
					</div>
				</div>
				<div class="team-wrap">
					<div class="team-member text-center">
						<div class="team-img">
							<img src="{{ asset('img/aparatur/aparatur4.jpg') }}" alt="" class="radius-image img-fluid">
						</div>
						<a href="#url" class="team-title">Fajar</a>
						<p>Bendahara</p>
					</div>
				</div>
				<div class="team-wrap">
					<div class="team-member text-center">
						<div class="team-img">
							<img src="{{ asset('img/aparatur/aparatur5.jpg') }}" alt="" class="radius-image img-fluid">
						</div>
						<a href="#url" class="team-title">Sultan</a>
						<p>Admin</p>
					</div>
				</div>
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
				<p class="mt-3">Bank Aceh Syariah terus berupaya memanjakan nasabahnya dengan meningkatkan pelayanan dan menambah akses keuangan. Kemudahan terbaru yang diberikan bank milik daerah ini adalah menyediakan fasilitas atau aplikasi mobile banking yang diberi nama <strong>Aceh Transaction Online (ACTION)</strong></p>
			</div>
			<div class="col-lg-6 mt-lg-0 mt-5">
				<img src="{{ asset('img/info/info1.jpg') }}" alt="" class="radius-image img-fluid">
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
						<div class="timer count-title count-number mt-3" data-to="20" data-speed="1000"></div>
						<p class="count-text ">Hari ini</p>
					</div>
				</div>
				<div class="col-md-4 col-12">
					<div class="counter">
						<span class="fa fa-globe-asia"></span>
						<div class="timer count-title count-number mt-3" data-to="684" data-speed="1000"></div>
						<p class="count-text ">Bulan ini</p>
					</div>
				</div>
				<div class="col-md-4 col-12">
					<div class="counter">
						<span class="fa fa-globe-asia"></span>
						<div class="timer count-title count-number mt-3" data-to="4822" data-speed="1000"></div>
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
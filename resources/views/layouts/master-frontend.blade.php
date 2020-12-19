<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
		<link href="//fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
        <!-- Styles -->
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('img/logo-sm.png') }}" type="image/x-icon">
    </head>
    <body>
        <!--header-->
		<header id="site-header" class="fixed-top">
			<div class="container">
				<nav class="navbar navbar-expand-lg stroke">
					<h1><a class="navbar-brand mr-lg-5" href="{{ route('site') }}"><img src="{{ asset('img/logo-sm.png') }}" class="mr-2" alt="Your logo" title="Your logo" height="40px;">Blank Kolak II</a></h1>
					<button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
						<span class="navbar-toggler-icon fa icon-close fa-times"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarToggler">
						<ul class="navbar-nav w-100">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sekilas Desa</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">Belum Tersedia</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pemerintahan</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('visimisi') }}">Visi & Misi</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info Publik</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('site.article') }}">Artikel</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layanan</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">Belum Tersedia</a>
								</div>
							</li>
							<li class="ml-lg-auto mr-lg-0 m-auto">
								<div class="search-right">
									<a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
									<div id="search" class="pop-overlay">
										<div class="popup">
											<h4 class="mb-3">Apa yang kamu cari ?</h4>
											<form action="#" method="GET" class="search-box">
												<input type="search" placeholder="Masukkan kata kunci" name="search" required="required" autofocus="">
												<button type="submit" class="btn btn-style btn-primary">Cari</button>
											</form>
										</div>
										<a class="close" href="#close">×</a>
									</div>
								</div>
							</li>
							<li class="align-self">
								<a href="{{ route('dashboard') }}" class="btn btn-style btn-primary ml-lg-3 mr-lg-2"><span class="fas fa-sign-in-alt mr-2"></span>SIDesa</a>
							</li>
						</ul>
					</div>
					<div class="mobile-position">
						<nav class="navigation">
							<div class="theme-switch-wrapper">
								<label class="theme-switch" for="checkbox">
									<input type="checkbox" id="checkbox">
									<div class="mode-container">
										<i class="gg-sun"></i>
										<i class="gg-moon"></i>
									</div>
								</label>
							</div>
						</nav>
					</div>
				</nav>
			</div>
		</header>
		@yield('content')
		<!-- footer -->
		<div class="w3l-footer-main">
			<div class="w3l-sub-footer-content">
				<section class="_form-3">
					<div class="form-main">
						<div class="container">
							<div class="middle-section grid-column top-bottom">
								<div class="image grid-three-column">
									<img src="{{ asset('img/subscribe.png') }}" alt="" class="img-fluid radius-image-full">
								</div>
								<div class="text-grid grid-three-column">
									<h2>Langganan artikel desa supaya menerima update terbaru dari desa</h2>
									<p>Jangan lewatkan berita terbaru.</p>
								</div>
								<div class="form-text grid-three-column">
									<form action="#" method="GET">
										<input type="email" name=" placeholder" placeholder="Masukkan Email Kamu" required="">
										<button type="submit" class="btn btn-style btn-primary">Kirim</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
				<footer class="footer-14">
					<div id="footers14-block">
						<div class="container">
							<div class="footers20-content">
								<div class="d-grid grid-col-4 grids-content">
									<div class="column">
										<h4>Alamat</h4>
										<p>Desa Blang Kolak II, Kecamatan Bebesan, Kabupaten Aceh Tengah, Provinsi Aceh.</p>
									</div>
									<div class="column">
										<h4>Hubungi Kami</h4>
										<p>Senin-Jumat | 09:00 - 17:00</p>
										<p><a href="tel:021345678910">021345678910</a></p>
									</div>
									<div class="column">
										<h4>Kirim Pesan</h4>
										<p><a href="mailto:blangkolakdua@sidesa.id">blangkolakdua@sidesa.id</a></p>
									</div>
									<div class="column">
										<h4>Ikuti Kami di</h4>
										<ul>
											<li>
												<a href="#"><span class="fab fa-facebook-square" aria-hidden="true"></span></a>
											</li>
											<li>
												<a href="#"><span class="fab fa-twitter-square" aria-hidden="true"></span></a>
											</li>
											<li>
												<a href="#"><span class="fab fa-instagram-square" aria-hidden="true"></span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="footers14-bottom d-flex">
								<div class="copyright">
									<p>© 2020 Blang Kolak II. All rights reserved. Design by <a href="#">W3Layouts</a> | <a href="#">Aveas</a></p>
								</div>
								<div class="language-select d-flex">
									<span class="fa fa-language" aria-hidden="true"></span>
									<select class="mr-1">
										<option>Indonesia</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<button onclick="topFunction()" id="movetop" title="Go to top">&uarr;</button>
				</footer>
			</div>
		</div>
    </body>
		<!-- //script -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/theme-change.js') }}"></script>
		<script src="{{ asset('js/owl.carousel.js') }}"></script>
		<script src="{{ asset('js/counter.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/style.js') }}"></script>
</html>

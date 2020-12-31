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
		<link rel="shortcut icon" href="{{ asset('img/logo/'.$glo['data'][0]->G) }}" type="image/x-icon">
    </head>
    <body>
        <!--header-->
		<header id="site-header" class="fixed-top">
			<div class="container">
				<nav class="navbar navbar-expand-lg stroke">
					<h1><a class="navbar-brand mr-lg-5" href="{{ route('site') }}"><img src="{{ asset('img/logo/'.$glo['data'][0]->G) }}" class="mr-2" alt="Your logo" title="Your logo" height="40px;">Desa {{ $glo['data'][0]->F }}</a></h1>
					<button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
						<span class="navbar-toggler-icon fa icon-close fa-times"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarToggler">
						<ul class="navbar-nav w-100">
							<li class="nav-item dropdown mr-lg-0 m-auto">
								<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sekilas Desa</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">Belum Tersedia</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pemerintahan</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('site.visimisi') }}">Visi & Misi</a>
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
						</ul>
					</div>
				</nav>
			</div>
		</header>
		@yield('content')
		<!-- footer -->
		<div class="w3l-footer-main" id="footer">
			<div class="w3l-sub-footer-content">
				<footer class="footer-14">
					<div id="footers14-block">
						<div class="container">
							<div class="footers20-content">
								<div class="d-grid grid-col-4 grids-content">
									<div class="column">
										<h4>Alamat</h4>
										<p>Desa {{ $glo['data'][0]->F }}, Kecamatan {{ $glo['data'][0]->E }}, Kabupaten {{ $glo['data'][0]->C }}, Provinsi {{ $glo['data'][0]->A }}.</p>
									</div>
									<div class="column">
										<h4>Hubungi Kami</h4>
										<p>{{ $glo['data'][1]->B }}</p>
										<p><a href="tel:{{ $glo['data'][1]->C }}">{{ $glo['data'][1]->C }}</a></p>
									</div>
									<div class="column">
										<h4>Kirim Pesan</h4>
										<p><a href="mailto:{{ $glo['data'][1]->D }}">{{ $glo['data'][1]->D }}</a></p>
									</div>
									<div class="column">
										<h4>Ikuti Kami di</h4>
										<ul>
											<li>
												<a href="{{ $glo['data'][1]->E }}"><span class="fab fa-facebook-square" aria-hidden="true"></span></a>
											</li>
											<li>
												<a href="{{ $glo['data'][1]->F }}"><span class="fab fa-twitter-square" aria-hidden="true"></span></a>
											</li>
											<li>
												<a href="{{ $glo['data'][1]->G }}"><span class="fab fa-instagram-square" aria-hidden="true"></span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="footers14-bottom d-flex justify-content-center">
								<div class="copyright">
									<p>© 2020 {{ $glo['data'][0]->F }}. All rights reserved. Design by <a href="#">W3Layouts</a> | <a href="#">Aveas</a></p>
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

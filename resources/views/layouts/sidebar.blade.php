<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="{{ route('site') }}" class="brand-link">
		<img src="{{ asset('img/logo-sm.png') }}" alt="SIDesa" class="brand-image img-circle elevation-3">
		<span class="brand-text font-weight-light">Desa Blang Kolak II</span>
	</a>
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{ asset('img/user.jpg') }}" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">{{ Auth::user()->name }}</a>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-header">MENU UTAMA</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i><p>Permintaan Surat</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-chart-bar"></i><p>Laporan Keuangan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-bullhorn"></i><p>Aspirasi</p>
					</a>
				</li>
				<li class="nav-item menu-open">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-user-tie"></i><p>Jurnalistik<i class="right fas fa-angle-left"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fas fa-newspaper nav-icon"></i><p>Berita</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('jurnalis') }}" class="nav-link">
								<i class="fas fa-user nav-icon"></i><p>Jurnalis</p>
							</a>
						</li>
					</ul>
				</li>
                @hasanyrole('Admin|Kepala Dusun|Ketua RW|Ketua RT')
				<li class="nav-item menu-open">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-users"></i><p>Kependudukan<i class="right fas fa-angle-left"></i></p>
					</a>
					<ul class="nav nav-treeview">
                        @can('dusun')
						<li class="nav-item">
							<a href="{{ route('dusun') }}" class="nav-link">
								<i class="fas fa-user nav-icon"></i><p>Dusun</p>
							</a>
						</li>
                        @endcan
                        @can('rukun-warga')
						<li class="nav-item">
							<a href="{{ route('rw') }}" class="nav-link">
								<i class="fas fa-user nav-icon"></i><p>Rukun Warga</p>
							</a>
						</li>
                        @endcan
                        @can('rukun-tetangga')
						<li class="nav-item">
							<a href="{{ route('rt') }}" class="nav-link">
								<i class="fas fa-user nav-icon"></i><p>Rukun Tetangga</p>
							</a>
						</li>
                        @endcan
                        @can('penduduk')
						<li class="nav-item">
							<a href="{{ route('penduduk') }}" class="nav-link">
								<i class="fas fa-user nav-icon"></i><p>Penduduk</p>
							</a>
						</li>
                        @endcan
					</ul>
				</li>
                @endhasanyrole
			</ul>
		</nav>
	</div>
</aside>
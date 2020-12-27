<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="{{ route('site') }}" class="brand-link">
		<img src="{{ asset('favicon.png') }}" alt="User Image" class="brand-image">
		<span class="brand-text font-weight-light"><strong>SIDesa</strong></span>
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
			<ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
					<a href="{{ route('dashboard') }}" class="nav-link {{ set_active(['dashboard']) }}">
						<i class="nav-icon fas fa-home"></i><p>Dashboard</p>
					</a>
				</li>
				<li class="nav-header">MENU UTAMA</li>
                @can('surat')
				<li class="nav-item">
					<a href="{{ route('surat') }}" class="nav-link">
						<i class="nav-icon fas fa-copy"></i><p>Permintaan Surat</p>
					</a>
				</li>
                @endcan
                @can('anggaran')
				<li class="nav-item">
					<a href="{{ route('anggaran') }}" class="nav-link">
						<i class="nav-icon fas fa-chart-bar"></i><p>Laporan Keuangan</p>
					</a>
				</li>
                @endcan
                @can('aspirasi')
				<li class="nav-item">
					<a href="{{ route('aspiration') }}" class="nav-link">
						<i class="nav-icon fas fa-bullhorn"></i><p>Aspirasi</p>
					</a>
				</li>
                @endcan
                @hasanyrole('Admin|Jurnalis')
				<li class="nav-item">
					<a href="#" class="nav-link {{ set_active(['article', 'article.create']) }}">
						<i class="nav-icon fas fa-user-tie"></i><p>Jurnalistik<i class="right fas fa-angle-left"></i></p>
					</a>
					<ul class="nav nav-treeview">
                        @can('berita')
						<li class="nav-item">
							<a href="{{ route('article') }}" class="nav-link {{ set_active(['article', 'article.create']) }}">
								<i class="fas fa-newspaper nav-icon"></i><p>Article</p>
							</a>
						</li>
                        @endcan
                        @can('jurnalis')
						<li class="nav-item">
							<a href="{{ route('jurnalis') }}" class="nav-link">
								<i class="fas fa-user nav-icon"></i><p>Jurnalis</p>
							</a>
						</li>
                        @endcan
					</ul>
				</li>
                @endhasanyrole
                @hasanyrole('Admin|Kepala Dusun|Ketua RW|Ketua RT')
				<li class="nav-item">
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
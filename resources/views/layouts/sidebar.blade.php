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
				<a href="#" class="d-block">Admin Pertama</a>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item menu-open">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-tachometer-alt"></i><p>Starter Pages<i class="right fas fa-angle-left"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="#" class="nav-link active">
								<i class="far fa-circle nav-icon"></i><p>Active Page</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i><p>Inactive Page</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-th"></i><p>Simple Link<span class="right badge badge-danger">New</span></p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
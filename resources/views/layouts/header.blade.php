<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-angle-right"></i></a>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto mr-2">
		<li class="nav-item d-none d-sm-inline-block">
			<a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out<i class="fas fa-power-off ml-2"></i></a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</li>
	</ul>
</nav>
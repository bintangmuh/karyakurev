<header class="app-header navbar">
	<button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
	<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="#" style="overflow: hidden"><img src="{{ asset('/img/karyaku-small-200px.png') }}" alt="karyaku logo" height="30" class="img-responsive"></a>
	<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
	<span class="navbar-toggler-icon"></span>
	</button>
	<ul class="nav navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<img src="{{ asset('img/noprofileimage.png') }}" class="img-avatar" alt="{{ Auth::guard('admin')->user()->name}}">
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<div class="dropdown-header text-center">
					<strong>Settings</strong>
				</div>
				<div class="divider"></div>
				<a class="dropdown-item" href="{{ route('admin.logout')}}"><i class="fa fa-lock"></i> Logout</a>
			</div>
		</li>
	</ul>
	
</header>
<div class="app-body">
	<div class="sidebar">
		<nav class="sidebar-nav">
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin.index')}}"><i class="fa fa-home"></i> Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin.report')}}"><i class="fa fa-flag"></i> Laporan
						<span class="badge badge-primary">{{ App\Report::all()->count() }}</span>
					</a>
				</li>
				<li class="nav-title">
					Pangkalan Data
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.tags')}}" class="nav-link"><i class="fa fa-tags"></i> Tags</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.prodi')}}" class="nav-link"><i class="fa fa-graduation-cap"></i> Program Studi</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.user')}}" class="nav-link"><i class="fa fa-user"></i> Administrator</a>
				</li>
			</ul>
		</nav>
		<button class="sidebar-minimizer brand-minimizer" type="button"></button>
	</div>

		


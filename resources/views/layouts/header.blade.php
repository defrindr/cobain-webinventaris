	<!-- Main Header -->
	<header class="main-header">
		<!-- Logo -->
		<a href="#" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini">IB</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg">Inventaris <b>Barang</b></span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
							<span class="hidden-xs">@if(Auth::user()->level->nama_level == "Peminjam") {{ Auth::user()->pegawai->nama_pegawai }} @else {{ Auth::user()->petugas->nama_petugas }} @endif</span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
							<img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

							<p>
								{{ Auth::user()->username }}
								<small>@if(Auth::user()->level->nama_level == "Peminjam") {{ Auth::user()->pegawai->alamat }} @else {{ "Selamat datang ".Auth::user()->level->nama_level }} @endif</small>
							</p>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
							@if(\Auth::user()->level->nama_level == "Administrator")
								<form action="/admin-logout" method="post"> @csrf @method("POST") <button class="btn btn-md btn-danger text-white btn-block">Logout</button></form>
							@else
								<span style="text-align:center;display:block">{{ Date('Y',time()) }}</span>
							@endif
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
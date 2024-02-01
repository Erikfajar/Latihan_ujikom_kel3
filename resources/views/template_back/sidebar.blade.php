
			<!-- main-sidebar -->
			<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
			<div class="sticky">
				<aside class="app-sidebar sidebar-scroll">
					<div class="main-sidebar-header active">
						<a class="desktop-logo logo-light active" href="index.html"><img src="{{ asset('images/logo_kelompokpng.png') }}" class="main-logo" alt="logo"></a>
						<a class="desktop-logo logo-dark active" href="index.html"><img src="{{ asset('back') }}/assets/img/brand/logo-white.png" class="main-logo" alt="logo"></a>
						<a class="logo-icon mobile-logo icon-light active" href="index.html"><img src="{{ asset('back') }}/assets/img/brand/favicon.png" alt="logo"></a>
						<a class="logo-icon mobile-logo icon-dark active" href="index.html"><img src="{{ asset('back') }}/assets/img/brand/favicon-white.png" alt="logo"></a>
					</div>
					<div class="main-sidemenu">
						<div class="main-sidebar-loggedin">
							<div class="app-sidebar__user">
								<div class="dropdown user-pro-body text-center">
									<div class="user-pic">
										<img src="{{asset('images/no-user.png')}}" alt="user-img" class="rounded-circle mCS_img_loaded">
									</div>
									<div class="user-info">
										<h6 class=" mb-0 text-dark">{{Auth::user()->nama_lengkap}}</h6>
										<span class="text-muted app-sidebar__user-name text-sm">{{ Auth::user()->role }}</span>
									</div>
								</div>
							</div>
						</div>
						<div class="sidebar-navs">
							<ul class="nav  nav-pills-circle">
							
							</ul>
						</div>
						<div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
						<ul class="side-menu ">
							<li class="slide">
								<a class="side-menu__item {{ request()->is('dashboard')? 'active':'' }}" href="{{route('dashboard')}}"><i class="side-menu__icon fe fe-trending-up"></i><span class="side-menu__label">Dashboard</span></a>
							</li>
							<li class="slide">
								<a class="side-menu__item {{ request()->is('dashboard/data_buku') || request('dashboard/data_buku/peminjaman')? 'active':'' }}" href="{{route('data_buku.index')}}"><i class="side-menu__icon fe fe-book"></i><span class="side-menu__label">Buku</span></a>
							</li>
							<li class="slide">
								<a class="side-menu__item {{ request()->is('dashboard/peminjaman')? 'active':'' }}" href="{{route('peminjaman.index')}}"><i class="side-menu__icon fe fe-share"></i><span class="side-menu__label">Peminjaman</span></a>
							</li>
							<li class="slide">
								<a class="side-menu__item {{ request()->is('dashboard/data_user')? 'active':'' }}" href="{{route('data_user.index')}}"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Data User</span></a>
							</li>
							<li class="slide">
								<a class="side-menu__item {{ request()->is('dashboard/ulasan_buku')? 'active':'' }}" href="{{route('ulasan_buku.index')}}"><i class="side-menu__icon si si-bubbles"></i><span class="side-menu__label">Ulasan Buku</span></a>
							</li>
						
						
						</ul>

						<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
					</div>
				</aside>
			</div>
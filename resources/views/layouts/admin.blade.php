<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('adminkit/img/icons/icon-48x48.png') }}" />

	<title>@yield('title', 'Dashboard') | Admin Toko Alat Kesehatan</title>

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('adminkit/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{ route('dashboard') }}">
          <span class="align-middle">Halaman Admin</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Data Admin
					</li>

					<li class="sidebar-item {{ Route::is('dashboard') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('dashboard') }}">
              				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            			</a>
					</li>

					<li class="sidebar-item {{ Route::is('users.*') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('users.index') }}">
              				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Data Customer</span>
            			</a>
					</li>

					<li class="sidebar-item {{ Route::is('categories.*') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('categories.index') }}">
              				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">kategori</span>
            			</a>
					</li>

					<li class="sidebar-item {{ Route::is('products.*') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('products.index') }}">
              				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">produk</span>
            			</a>
					</li>

					<!-- Tambahkan link lain sesuai dengan kebutuhan Anda -->

				</ul>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						@auth
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<!-- Contoh notifikasi -->
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<!-- Contoh pesan -->
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('adminkit/img/avatars/avatar-5.jpg') }}" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <img src="{{ asset('images/avatar.png') }}" class="avatar img-fluid rounded me-1" alt="{{ Auth::user()->name }}" /> <span class="text-dark">{{ Auth::user()->name }}</span>
                            </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="align-middle me-1" data-feather="log-out"></i> Log out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
						</li>
						@endauth
						@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">Register</a>
						</li>
						@endguest
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					@yield('content')
					
				</div>
			</main>

		</div>
	</div>

	<script src="{{ asset('adminkit/js/app.js') }}"></script>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
	<script>
		$(document).ready(function (){
			$('.rupiah').mask("#.##0", {
				reverse: true
			});
		});
	</script>

</body>

</html>

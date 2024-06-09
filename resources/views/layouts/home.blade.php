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

	<title>@yield('title', 'Dashboard') | Toko Alat Kesehatan</title>

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('adminkit/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="main">
		<nav class="navbar navbar-expand navbar-light bg-dark">
			<a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mr-2" style="height: 1.2em;">
            	<span class="align-middle btn btn-dark">Toko Alat Kesehatan</span>
        	</a>

			<div class="navbar-collapse collapse">
				<ul class="navbar-nav mx-auto">
					<li class="nav-item">
						<a class="nav-link btn btn-dark text-white" href="{{ route('home') }}">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-dark text-white" href="{{ route('categories.user_index') }}">Kategori</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-dark text-white" href="{{ route('products.user_index') }}">Produk</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-dark text-white" href="{{ route('cart.index') }}">Keranjang Belanja</a>
					</li>
				</ul>
			</div>

			<ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown" style="color: white";>
                        <img src="{{ asset('images/avatar.png') }}" class="avatar img-fluid rounded me-1" alt="{{ Auth::user()->name }}" /> <span class="text-white">{{ Auth::user()->name }}</span>
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
                        <a class="nav-link btn btn-dark text-white" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark text-white" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
			</ul>
		</nav>

		<main class="content">
			<div class="container-fluid p-0">
				@yield('content')
			</div>
		</main>
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

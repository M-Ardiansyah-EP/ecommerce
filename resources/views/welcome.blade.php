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

	<title>@yield('title', 'Dashboard') | ecommerce</title>

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
						<a class="nav-link btn btn-dark text-white" href="">Produk</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-dark text-white" href="">Kategori</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-dark text-white" href="">Keranjang Belanja</a>
					</li>
				</ul>
			</div>

			<ul class="navbar-nav ms-auto">
            @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Log in
                    </a>
            
                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
            
            @endif
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

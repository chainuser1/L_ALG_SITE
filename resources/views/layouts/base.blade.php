<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="ALG High School Reading Comprehension Helper">
		<meta name="keywords" content="alg,Gaming, magazine, html, reading comprehension">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		@yield('title')
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
		<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/mdbootstrap/css/style.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}"
	</head>
	<body>

		<script src="{{ asset('js/core/jquery.min.js') }}" ></script>
		<script src="{{ asset('js/manifest.js') }}"></script>
		<script src="{{ asset('js/vendor.js') }}"></script>
		<script src="{{ asset('js/app.js') }}" ></script>
		<div id="preloder">
			<div class="loader"></div>
		</div>
		<header class="header-section">
			<div class="header-wrap">
				<!-- <div class="header-social d-flex justify-content-end">
						<p>Follow us:</p>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
				</div> -->
				<div class="header-bar-warp d-flex">
					<a href="#" class="site-logo">
						{{ config('app.name', 'Laravel') }}
						<!-- <img src="../assets/vendors//img/logo.png" alt=""> -->
					</a>
					<nav class="top-nav-area w-100">
						<ul class="main-menu user-panel">
							@guest
							<li><a href="#account">Account</a>
							<ul class="sub-menu">
								<li><a href="#login" data-toggle="modal" data-target="#modalLoginForm">Login</a></li>
								<li><a href="#register" data-toggle="modal" data-target="#modalRegisterForm">Register</a></li>
							</ul>
						</li>
						@else
						<li><a href="#account">{{ Auth::user()->username }}</a>
						<ul class="sub-menu">
							<li><a href="#profile">Profile</a></li>
							<li><a href="#my-account">Account Settings</a></li>
							<li><a href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
							{{ __('Logout') }}</a></li>
						</ul>
					</li>
					@endguest
					
				</ul>
				<ul class="main-menu primary-menu">
					<li><a href="#">Home</a></li>
					<li><a href="#">Games</a>
				</li>
				<li><a href="#">Reviews</a></li>
				<li><a href="#">Selections</a>
				<ul class="sub-menu">
					<li><a href="#">Short Stories</a></li>
					<li><a href="#">Essays</a></li>
					<li><a href="#">Articles</a></li>
				</ul>
			</li>
			<li><a href="#">Contact</a></li>
		</ul>
	</nav>
</div>
</div>
</header>
<section>
@guest
<!-- modal login -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<form id="formLogin" method="post" action="{{ route('signin') }}" enctype='multipart/form-data' >
	@csrf
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-3">
				<div class="md-form mb-5">
					<i class="fas fa-envelope prefix indigo-text"></i>
					<input type="text" id="defaultForm-username" name="username" class="form-control validate indigo-text">
					<label data-error="wrong" data-success="right" for="defaultForm-username">Username</label>
				</div>
				<div class="md-form mb-4">
					<i class="fas fa-lock prefix indigo-text"></i>
					<input type="password" id="defaultForm-pass" name="password" class="form-control validate indigo-text">
					<label data-error="wrong" data-success="right" for="defaultForm-pass">Password</label>
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default purple darken-3">Login</button>
			</div>
		</div>
	</div>
</form>
</div>
<!-- modal login -->
<!-- Modal Register -->
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header text-center">
			<h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body mx-3">
			<div class="md-form mb-5">
				<i class="fas fa-user prefix grey-text"></i>
				<input type="text" id="orangeForm-username" class="form-control validateUsername" data-url="{{ route('username') }}">
				<label  for="orangeForm-username">Username</label>
			</div>
			<div class="md-form mb-5">
				<i class="fas fa-envelope prefix grey-text"></i>
				<input type="email" id="orangeForm-email" class="form-control validateEmail" data-url="{{ route('email') }}">
				<label  for="orangeForm-email">Email</label>
			</div>
			<div class="md-form mb-4">
				<i class="fas fa-lock prefix grey-text"></i>
				<input type="password" id="orangeForm-pass" class="form-control validatePass">
				<label data-error="wrong" data-success="right" for="orangeForm-pass">Password</label>
			</div>
			<div class="md-form mb-4">
				<i class="fas fa-lock prefix grey-text"></i>
				<input type="password" id="orangeForm_confirm_pass" class="form-control validateConfirm">
				<label data-error="wrong" data-success="right" for="orangeForm-confirm_pass">Confirm password</label>
			</div>
		</div>
		<div class="modal-footer d-flex justify-content-center">
			<button class="btn btn-default purple darken-3" id="SignUpFormBtn" data-url="{{ route('register') }}">Sign up</button>
		</div>
	</div>
</div>
</div>
<!-- modal register -->
@else
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
@endguest
</section>
<main class="py-6">
@yield('content')
</main>
<footer class="footer-section">
<div class="container">
<!-- <div class="footer-left-pic">
						<img src="../assets/vendors/img/footer-left-pic.png" alt="">
</div>
<div class="footer-right-pic">
						<img src="../assets/vendors/img/footer-right-pic.png" alt="">
</div> -->
<!-- <a href="#" class="footer-logo">
						<img src="../assets/vendors/img/logo.png" alt="">
</a> -->
<ul class="main-menu footer-menu">
	<li><a href="#">About Us</a></li>
	<li><a href="#">Programmes</a></li>
</ul>
<div class="footer-social d-flex justify-content-center">
	<a href="#"><i class="fa fa-pinterest"></i></a>
	<a href="#"><i class="fa fa-facebook"></i></a>
	<a href="#"><i class="fa fa-twitter"></i></a>
	<a href="#"><i class="fa fa-dribbble"></i></a>
	<a href="#"><i class="fa fa-behance"></i></a>
</div>
<div class="copyright"><a href="">
	Copyright &copy;<script type="text/javascript">document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_self">Province of Leyte</a>
</div>
</div>
</footer>

<script src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="78225a9936e2aafa5e1583f7-text/javascript"></script>
<script type="text/javascript" src="{{ asset('js/magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/slicknav.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sticky-sidebar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rocket-loader.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/fetch_setup.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/auth_fetch.min.js') }}"></script>
<script type="text/javascript">
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
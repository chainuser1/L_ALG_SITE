<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
		<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		@yield('title')
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
		<!-- CSS here -->
		<link rel="stylesheet" href="{{ asset('vendor/mdbootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/mdbootstrap/css/mdb.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
		<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/mdbootstrap/css/style.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/paper-dashboard.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/admin-prime.css') }}">
	</head>
	<body>
		<div id="preloder">
			<div class="loader" ></div>
		</div>
		<div class="wrapper purple" >
			<div class="sidebar " data-color="white" data-active-color="primary">
				<!-- logo -->
				<div class="logo">
					<a href="http://www.creative-tim.com" class="simple-text logo-mini">
						<div class="logo-image-small">
							<!-- <img src="../assets/img/logo-small.png"> -->
						</div>
					</a>
					<a href="{{ url('/') }}" class="simple-text logo-normal">
						ALGSITE.COM
						<!-- <div class="logo-image-big">
											<img src="../assets/img/logo-big.png">
						</div> -->
					</a>
				</div>
				<!-- Menu Items -->
				<div class="sidebar-wrapper">
					<ul class="nav">
						<li class="active">
							<i class="nc-icon nc-bank"></i>
							<a href="{{ route('dashboard') }}">Dashboard</a>
						</li>
						<li>
							<i class="nc-icon nc-bank"></i>
							<a href="#">Upload a Game</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- main panel -->
			<div class="main-panel">
				<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
					<div class="container-fluid">
						<div class="navbar-wrapper">
							<div class="navbar-toggle">
								<button type="button" class="navbar-toggler">
								<span class="navbar-toggler-bar bar1"></span>
								<span class="navbar-toggler-bar bar2"></span>
								<span class="navbar-toggler-bar bar3"></span>
								</button>
							</div>
							<a class="navbar-brand" href="#{{ Auth::user()->username }}">Admin Panel</a>
						</div>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-bar navbar-kebab"></span>
						<span class="navbar-toggler-bar navbar-kebab"></span>
						<span class="navbar-toggler-bar navbar-kebab"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end" id="navigation">
							<form>
								<div class="input-group no-border">
									<input type="text" value="" class="form-control" placeholder="Search...">
									<div class="input-group-append">
										<div class="input-group-text">
											<i class="nc-icon nc-zoom-split"></i>
										</div>
									</div>
								</div>
							</form>
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link btn-magnify" href="#pablo">
										<i class="nc-icon nc-layout-11"></i>
										<p>
											<span class="d-lg-none d-md-block">Stats</span>
										</p>
									</a>
								</li>
								<li class="nav-item btn-rotate dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="nc-icon nc-bell-55"></i>
										<p>
											<span class="d-lg-none d-md-block">Notifications</span>
										</p>
									</a>
									<!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div> -->
								</li>
								<li class="nav-item">
									<a class="nav-link btn-rotate" href="#pablo">
										<i class="nc-icon nc-settings-gear-65"></i>
										<p>
											<span class="d-lg-none d-md-block">Account Settings</span>
										</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="content">
					@yield('content')
				</div>
			</div>
			<!-- scripts -->
			<script src="{{ asset('vendor/mdbootstrap/js/jquery-3.3.1.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('vendor/mdbootstrap/js/bootstrap.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('vendor/mdbootstrap/js/mdb.min.js') }}"></script>
			<script src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="78225a9936e2aafa5e1583f7-text/javascript"></script>
			<script type="text/javascript" src="{{ asset('js/magnific-popup.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/slicknav.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/sticky-sidebar.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/rocket-loader.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/fetch_setup.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/paper-dashboard.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/scrollbar-jquery.min.js') }}"></script>
			<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
		</body>
	</html>
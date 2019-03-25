@extends('layouts.base')
@section('title')
<title>Welcome to ALG</title>
@endSection


@section('content')
<section class="hero-section overflow-hidden">
	<div class="hero-slider owl-carousel">
		<div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="{{ asset('img/slider-bg-1.jpg') }}">
			<div class="container">
				<h2>Read and Play!</h2>
				<p>Each selection is packed with enjoyable games you'll like</p>
				<a href="#" class="site-btn">Read More <img src="{{ asset('img/icons/double-arrow.png') }}" alt="#" /></a>
			</div>
		</div>
		<div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="{{ asset('img/slider-bg-2.jpg') }}">
			<div class="container">
				<h2>Game on!</h2>
				<p>Just read a selection and play games.<br><b>That's all!!!</b></p>
				<a href="#" class="site-btn">Read More <img src="{{ asset('img/icons/double-arrow.png') }}" alt="#" /></a>
			</div>
		</div>
	</div>
</section>
@endsection
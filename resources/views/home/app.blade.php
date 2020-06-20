<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('assets\home\css\animate.css') }}"> <!--css/animate.css-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets\home\css\bootstrap.min.css') }}"><!--css/bootstrap.min.css-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets\home\css\font-awesome.min.css') }}"><!--css/font-awesome.min.css-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets\home\css\owl.carousel.css') }}"><!---css/owl.carousel.css--->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets\home\css\chosen.css') }}"><!--css/chosen.css--->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets\home\css\linearicons.css') }}"><!--css/linearicons.css-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets\home\css\easyzoom.css') }}"><!--css/easyzoom.css-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets\home\css\jquery.mCustomScrollbar.css') }}"><!--css/jquery.mCustomScrollbar.css-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets\home\css\style.css') }}"><!--css/style.css-->
	@yield('page-css')
	<style>
		.modal .modal-dialog{
			margin: 10px auto;
		}
	</style>
	<link href="{{ asset('assets\home\downloaded\font.css') }}" rel='stylesheet' type='text/css'>
	<link href="{{ asset('assets\home\downloaded\font2.css') }}" rel='stylesheet' type='text/css'>
</head>
<body>
<div id="box-mobile-menu" class="box-mobile-menu full-height">
    <div class="box-inner">
        <a href="#" class="close-menu"><span class="icon fa fa-times"></span></a>
    </div>
</div>
<div id="header-ontop" class="is-sticky full-width"></div>
<header id="header" class="header style3">
	<div class="container">
		<div class="main-menu-wapper">
			<div class="row">
				<div class="col-ts-12 col-xs-3 col-sm-2">
					<div class="logo">
						<a href="{{ url('/') }}"><img src="{{ asset('assets/home') }}/images/logos/1.png" alt=""></a>
					</div>
				</div>
				<div class="col-ts-12 col-xs-9 col-sm-10">
					<div class="header-control">
						<div class="form-search">
							<a class="icon" href="#"><i class="lnr lnr-magnifier"></i></a>
							<form>
								<div class="inner-form">
									<input type="text" placeholder="Enter text here...">
									<a href="#" class="close-box"><i class="lnr lnr-cross"></i></a>
								</div>
							</form>
						</div>
						<div class="mini-cart">
							<a href="{{ url('/cart') }}" class="cart-link">
								<span class="icon lnr lnr-cart"></span>
								<span class="count cart-count"></span>
							</a>
						</div>
					</div>
					<a href="#" class="mobile-navigation">
						<span></span>
						<span></span>
						<span></span>
					</a>
					<ul class="kt-nav main-menu clone-main-menu">
						<li class="@yield('home-active')">
							<a href="{{url('/')}}">Home</a>
						</li>
						@guest
						<li>
							<a data-toggle="modal" href="#LoginModal">Login</a>
						</li>
						<li>
							<a data-toggle="modal" href="#SignupModal">Register</a>
						</li>
						@endguest
						@auth
						<li>
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">Logout</a>
						</li>
						<form id="logout-form" style="display:none;" action="{{route('logout')}}" method="post">
							@csrf
							<input type="submit">
						</form>
						@endauth
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>
@php
	if(!session()->has("cart")){
	 	session()->put("cart",[]);
	}
@endphp
@yield('content')

{{-- modals --}}

<div id="SignupModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-body">
			<form class="login" style="display: block;">
				<h3 class="form-title">Register</h3>
				<p class="form-row form-row-first">
					<label for="rname">Name <span class="required">*</span></label>
					<input class="input-text" id="rname" type="text">
				</p>
				<p class="form-row form-row-first">
					<label for="remail">Email <span class="required">*</span></label>
					<input class="input-text" id="remail" type="text">
				</p>
				<p class="form-row form-row-first">
					<label for="rphone">Phone number<span class="required">*</span></label>
					<input class="input-text" id="rphone" type="number">
				</p>
				<p class="form-row form-row-last">
					<label for="rpassword">Password <span class="required">*</span></label>
					<input class="input-text" id="rpassword" type="password">
				</p>
				<p class="form-row">
					<button type="button" class="button" data-dismiss="modal" aria-label="Close">Close</button>
					<button type="button" class="button" id="register">Register</button>
					<div class="lost_password">Already have an account? <a data-dismiss="modal" aria-label="Close"  data-toggle="modal" data-target="#LoginModal" class="lost_password">Signup</a></div>
				</p>
			</form>
		</div>
	  </div>
	</div>
  </div>

<div id="LoginModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-body">
		<form class="login" style="display: block;">
			<div class="" id="login-alert"></div>
			<input type="hidden" id="status">
			<h3 class="form-title">Login</h3>
			<p class="form-row form-row-first">
				<label for="lemail">Email <span class="required">*</span></label>
				<input class="input-text" id="lemail" type="text">
			</p>
			<p class="form-row form-row-last">
				<label for="lpassword">Password <span class="required">*</span></label>
				<input class="input-text" name="password" id="lpassword" type="password">
			</p>
			<p class="form-row">
				<input id="lrememberme" value="forever" type="checkbox">
				<label for="lrememberme" class="inline">Remember me</label>
			</p>
			<p class="lost_password">
				<a href="#">Lost your password?</a>
			</p>
			<button type="button" class="button" data-dismiss="modal" aria-label="Close">Close</button>
			<button class="button" type="button" id="login">Login</button>
			<div class="lost_password">Do not have an account? <a data-dismiss="modal" aria-label="Close"  data-toggle="modal" class="lost_password" href="#SignupModal">Signup</a></div>
		</form>
		</div>
	  </div>
	</div>
  </div>
{{-- modals --}}

<footer class="footer style2">
	<div class="footer-inner">
		<div class="container">
			<div class="row footer-row">
				<div class="col-sm-12 col-md-4 footer-col">
					<div class="widget widget_nav_menu">
						<ul>
							<li><a href="#">My Account</a></li>
							<li><a href="#">Payment</a></li>
							<li><a href="#">Shipping</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Brands</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Terms</a></li>
							<li><a href="#">Privacy</a></li>

						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-4 footer-col">
					<div class="widget widget_social">
						<h2 class="widgettitle">STAY CONNECTED</h2>
						<div class="social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-instagram"></i></a>
							<a href="#"><i class="fa fa-pinterest"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4 footer-col">
					<div class="widget footer_newsletter">
						<h2 class="widgettitle">GET UPDATES</h2>
						<form>
							<input type="email" name="EMAIL" placeholder="Subscribe to our newsletter" required />
							<button class="submit">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="footer-language">
				<a class="active" href="#">eng</a>
				<a href="#">fr</a>
			</div>
			<div class="coppyright">© 2015 ALESIA</div>
		</div>
	</div>
</footer>
	<a href="#" class="scroll_top" title="Scroll to Top" style="display: block;"><i class="fa fa-arrow-up"></i></a>
	<script type="text/javascript" src="{{ asset('assets/home/js/jquery-2.1.4.min.js') }}"></script>
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
	<script type="text/javascript" src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/home/js/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/home/js/Modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/home/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/home/js/imagesloaded.pkgd.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/home/js/isotope.pkgd.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/home/js/easyzoom.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/home/js/jquery.parallax-1.1.3.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/home/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/home/js/functions.js') }}"></script>
    @yield('page-js')
	@yield('custom-js')
	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var cartUrl = "{{url('cart')}}";
		var userUrl = "{{url('user')}}";
		var homeRoute = "{{route('home')}}";
	</script>
	<script src="{{asset('assets\home\customJS\cart.js')}}"></script>
	<script src="{{asset('assets\home\customJS\auth.js')}}"></script>
</body>
</html>

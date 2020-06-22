@extends('home.app')
@section('home-active','active')
@section('content')

<div class="container">
    @if(sizeof($banners) > 1)
	<div class="kt_home_slide slide-home3 nav-center-center" data-nav="true" data-autoplay="true" data-loop="true" data-responsive='{"0":{"items":1,"nav":"false"},"600":{"items":1},"1000":{"items":1}}'>
		@foreach ($banners as $banner)
		<div class="item-slide" data-background="{{ asset('storage/app/public/banner/'.$banner->image) }}"  data-height="654"  data-reponsive='{"320":350,"480":400,"768":550,"1024":654}'>
			<div class="content-slide">
				<div class="inner">
					<h2 data-animate="bounceInLeft " class="caption title" style="color: white">{{ $banner->title }}</h2>
					<span data-animate="fadeInDown" class="caption subtitle" style="color: white">{{ $banner->description }}</span>
					{{-- <a data-animate="fadeInDown" class="caption link button" href="#">Shopnow</a> --}}
				</div>
			</div>
		</div>
		@endforeach
	</div>
	@endif

	{{-- latest products --}}
	<div class="margin-top-35">
		<div class="container">
		    @if(sizeof($products) > 0)
			<div class="section-heading text-left margin-bottom-35">
				<h3 class="title">NEW ARRIVALS</h3>
			</div>
			@endif
			<ul class="owl-products owl-carousel nav-center-center" data-loop="true" data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2},"768":{"items":3},"1024":{"items":4}}'>
				@foreach($products as $product)
				<li class="product-item">
					<div class="product-inner">
						@if ($product->stock == false)
						<div class="flash">
							<span class="sale">Sale</span>
						</div>
						@endif
						<div class="thumb">
							<a class="product-image" href="{{url('product/no/'.$product->id)}}"><img style="width:263px!important;height:263px!important;" src="{{ asset('storage/app/public/product/'.$product->images[0]->image) }}" alt=""></a>
							<div class="group-buttons">
								<a href="javascript:void(0)" onclick="add_to_cart({{$product->id}})" class="button add_to_cart_button">Add to cart</a>
							</div>
						</div>
						<div class="info">
							<h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
							<span class="price">
								<del>{{ $product->price*1.25}} Tk</del>
								<ins>{{ $product->price }} Tk</ins>
							</span>
						</div>
					</div>
				</li>
				@endforeach
			</ul>
		</div>
	</div>


	<!-- Box category -->
	@if(sizeof($categories) > 0)
	<div class="kt-box-categories margin-top-70">
		<div class="head">
			 <h3 class="title">CATEGORIES</h3> 
			<a href="#" class="more">View all<span class="lnr lnr-arrow-right"></span></a>
		</div>
		<div class="content">
			<ul class="owl-categories owl-carousel nav-center-center" data-loop="true" data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2},"768":{"items":3},"1024":{"items":4}}'>
				@foreach ($categories as $category)
					<li class="product-item product-category">
						<div class="inner">
							<a href="#"><img style="width:263px!important;height:263px!important;" src="{{ asset('storage/app/public/category/'.$category->image ) }}" alt=""></a>
							<h3>{{ $category->name }} <mark class="count">({{ count($category->products) }})</mark></h3>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	@endif
	<!-- ./Box category -->

    <!--category tab product-->
	<div class="container">
		<!-- Tab -->
		<div class="section-tab-product margin-top-90">
			<div class="kt-tabs kt-tab-fadeeffect">
				<div class="tab-head">
					<ul class="nav-tab ">
						@php
							$i=1
						@endphp
						@foreach ($categories as $category)
							@if(sizeof($category->products) > 0) 
							<li class="@if($i==1) active @endif"><a data-animated="fadeInRight" data-toggle="tab" href="#tab-{{$i}}">{{ $category->name }}</a>
							</li>
							@php
								$i++
							@endphp
							@endif
						@endforeach
					</ul>
				</div>
				<div class="tab-container">
					@php
						$i=1
					@endphp
					@foreach ($categories as $category)
					<div id="tab-{{$i}}" class="tab-panel @if($i==1) active @endif">
						<ul class="owl-products margin-top-45 owl-carousel nav-center-center" data-responsive='{"0":{"items":1,"nav":"false"},"480":{"items":2},"768":{"items":3},"1024":{"items":4}}'>
							@foreach ($category->products as $product)
							@if(sizeof($category->products) > 0) 
							<li class="product-item">
								<div class="product-inner">
									@if ($product->stock == false)
									<div class="flash">
										<span class="sale">Sale</span>
									</div>
									@endif
									<div class="thumb">
										<a class="product-image" href="{{url('product/no/'.$product->id)}}"><img style="width:263px!important;height:263px!important;" src="{{ asset('/storage/app/public/product/'.$product->images[0]->image ) }}" alt=""></a>
										<div class="group-buttons">
											<a href="javascript:void(0)" onclick="add_to_cart({{$product->id}})" class="button add_to_cart_button">Add to cart</a>
										</div>
									</div>
									<div class="info">
										<h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
										<span class="price">
											<del>{{ $product->price*1.2 }}  Tk</del>
											<ins>{{ $product->price }}  Tk</ins>
										</span>
									</div>
								</div>
							</li>
							@php
								$i++
							@endphp
							@endif
							@endforeach
						</ul>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- ./Tab -->
	</div>
	<!--category tab product-->

	<div class="margin-top-60">
		<a class="bannereffect-2" href="#"><img src="{{ asset('assets/home') }}/images/banners/15.jpg" alt=""></a>
	</div>
	<!-- Block product -->
	<div class="margin-top-60">
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<div class="block-products">
					<h3 class="title">BEST SELLERS</h3>
					<div class="block-content">
						<ul class="product-list">
							<li class="product">
								<div class="thumb">
									<a href="#"><img src="{{ asset('assets/home') }}/images/products/40.jpg" alt=""></a>
								</div>
								<div class="info">
									<h4 class="product-name">
										<a href="#">SPORT SHOES</a>
									</h4>
									<span class="price">$36.90</span>
								</div>
							</li>
							<li class="product">
								<div class="thumb">
									<a href="#"><img src="{{ asset('assets/home') }}/images/products/41.jpg" alt=""></a>
								</div>
								<div class="info">
									<h4 class="product-name">
										<a href="#">SPORT SHOES</a>
									</h4>
									<span class="price">$36.90</span>
								</div>
							</li>
							<li class="product">
								<div class="thumb">
									<a href="#"><img src="{{ asset('assets/home') }}/images/products/42.jpg" alt=""></a>
								</div>
								<div class="info">
									<h4 class="product-name">
										<a href="#">SPORT SHOES</a>
									</h4>
									<span class="price">$36.90</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="block-products">
					<h3 class="title">TOP RATED</h3>
					<div class="block-content">
						<ul class="product-list">
							<li class="product">
								<div class="thumb">
									<a href="#"><img src="{{ asset('assets/home') }}/images/products/43.jpg" alt=""></a>
								</div>
								<div class="info">
									<h4 class="product-name">
										<a href="#">SPORT SHOES</a>
									</h4>
									<span class="price">$36.90</span>
								</div>
							</li>
							<li class="product">
								<div class="thumb">
									<a href="#"><img src="{{ asset('assets/home') }}/images/products/44.jpg" alt=""></a>
								</div>
								<div class="info">
									<h4 class="product-name">
										<a href="#">SPORT SHOES</a>
									</h4>
									<span class="price">$36.90</span>
								</div>
							</li>
							<li class="product">
								<div class="thumb">
									<a href="#"><img src="{{ asset('assets/home') }}/images/products/45.jpg" alt=""></a>
								</div>
								<div class="info">
									<h4 class="product-name">
										<a href="#">SPORT SHOES</a>
									</h4>
									<span class="price">$36.90</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="block-products">
					<h3 class="title">POPULAR</h3>
					<div class="block-content">
						<ul class="product-list">
							<li class="product">
								<div class="thumb">
									<a href="#"><img src="{{ asset('assets/home') }}/images/products/46.jpg" alt=""></a>
								</div>
								<div class="info">
									<h4 class="product-name">
										<a href="#">SPORT SHOES</a>
									</h4>
									<span class="price">$36.90</span>
								</div>
							</li>
							<li class="product">
								<div class="thumb">
									<a href="#"><img src="{{ asset('assets/home') }}/images/products/47.jpg" alt=""></a>
								</div>
								<div class="info">
									<h4 class="product-name">
										<a href="#">SPORT SHOES</a>
									</h4>
									<span class="price">$36.90</span>
								</div>
							</li>
							<li class="product">
								<div class="thumb">
									<a href="#"><img src="{{ asset('assets/home') }}/images/products/48.jpg" alt=""></a>
								</div>
								<div class="info">
									<h4 class="product-name">
										<a href="#">SPORT SHOES</a>
									</h4>
									<span class="price">$36.90</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="block-products">
					<h3 class="title">ON SALE</h3>
					<div class="block-content">
						<ul class="product-list">
							<li class="product">
								<div class="thumb">
									<a href="#"><img src="{{ asset('assets/home') }}/images/products/49.jpg" alt=""></a>
								</div>
								<div class="info">
									<h4 class="product-name">
										<a href="#">SPORT SHOES</a>
									</h4>
									<span class="price">$36.90</span>
								</div>
							</li>
							<li class="product">
								<div class="thumb">
									<a href="#"><img src="{{ asset('assets/home') }}/images/products/50.jpg" alt=""></a>
								</div>
								<div class="info">
									<h4 class="product-name">
										<a href="#">SPORT SHOES</a>
									</h4>
									<span class="price">$36.90</span>
								</div>
							</li>
							<li class="product">
								<div class="thumb">
									<a href="#"><img src="{{ asset('assets/home') }}/images/products/51.jpg" alt=""></a>
								</div>
								<div class="info">
									<h4 class="product-name">
										<a href="#">SPORT SHOES</a>
									</h4>
									<span class="price">$36.90</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ./Block product -->
</div>
@endsection

@section('custom-js')
	<script>
		var cartUrl = "{{url('cart')}}";
	</script>
@endsection


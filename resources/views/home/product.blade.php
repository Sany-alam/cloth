@extends('home.app')
@section('page-css')
	
<link type="text/css" rel="stylesheet" href="{{asset('assets\home\vendor\gallery-zoom-zoomy\dist\zoomy.css')}}" />
@endsection
@section('content')
<span class="line"></span>
<div class="main-container no-sidebar">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 main-content">
				<div class="single-product-fullwidth kt-fullwidth">
					<div class="product-single row">
						<div class="col-sm-6 single-product-left">
							{{-- <div class="images kt-images-zoom">
								<div class="kt-easyzoom easyzoom easyzoom--with-thumbnails">
									<a href="{{asset('assets/home')}}/images/products/38.jpg">
										<img src="{{asset('assets/home')}}/images/products/39.jpg" alt=""/>
									</a>
								</div>
								<ul class="kt-zoom-thumbnails owl-carousel nav-center-center" data-loop="true" data-nav="true" data-dots="false" data-margin="0" data-responsive='{"0":{"items":"2"},"480":{"items":"4"},"768":{"items":"4"},"992":{"items":"5"}}'>
									<li>
										<a class="thumb selected" href="{{asset('assets/home')}}/images/products/38.jpg" data-standard="{{asset('assets/home')}}/images/products/39.jpg">
											<img src="{{asset('assets/home')}}/images/products/33.jpg" alt="" />
										</a>
									</li>
									<li>
										<a class="thumb" href="https://placeholdit.imgix.net/~text?txtsize=53&amp;txt=FULL%2002&amp;w=1000&amp;h=1177" data-standard="https://placeholdit.imgix.net/~text?txtsize=53&amp;txt=standard02&amp;w=1000&amp;h=1170">
											<img src="{{asset('assets/home')}}/images/products/34.jpg" alt="" />
										</a>
									</li>
									<li>
										<a class="thumb" href="https://placeholdit.imgix.net/~text?txtsize=53&amp;txt=FULL%2003&amp;w=1000&amp;h=1177" data-standard="https://placeholdit.imgix.net/~text?txtsize=53&amp;txt=standard03&amp;w=1000&amp;h=1170">
											<img src="{{asset('assets/home')}}/images/products/35.jpg" alt="" />
										</a>
									</li>
									<li>
										<a class="thumb" href="https://placeholdit.imgix.net/~text?txtsize=53&amp;txt=FULL%2004&amp;w=1000&amp;h=1177" data-standard="https://placeholdit.imgix.net/~text?txtsize=53&amp;txt=standard04&amp;w=1000&amp;h=1170">
											<img src="{{asset('assets/home')}}/images/products/34.jpg" alt="" />
										</a>
									</li>
									<li>
										<a class="thumb" href="https://placeholdit.imgix.net/~text?txtsize=53&amp;txt=FULL%2004&amp;w=1000&amp;h=1177" data-standard="https://placeholdit.imgix.net/~text?txtsize=53&amp;txt=standard05&amp;w=1000&amp;h=1170">
											<img src="{{asset('assets/home')}}/images/products/35.jpg" alt="" />
										</a>
									</li>
								</ul>
							</div> --}}
							<div class="" id="myGallery"></div>
						</div>
						<div class="col-sm-6 single-product-right">
							<div class="summary">
								<h1 class="product_title entry-title">{{ $product->name }}</h1>
								<div>
									<p class="price">
										<del><span class="amount">{{ $product->price*1.2 }}Tk</span></del>
										<ins><span class="amount">{{ $product->price }}Tk</span></ins>
									</p>
								</div>
								{{-- <div class="woocommerce-product-rating">
									<div class="rating" title="Rated 2.67 out of 5">
										<i class="active fa fa-star"></i>
										<i class="active fa fa-star"></i>
										<i class="active fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>	
									<a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span class="count">3</span> Reviews)</a>
								</div>
								<div class="short-descript">
									<p>Aenean vulputate eleifend tellus.Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc. Integer tincidunt. Vivamus elementum semper nisi.</p>
								</div> --}}
								<div class="variations">
									<div class="variation-row">
										<label>Size</label>
										<div class="inner value">
											<select id="size">
												@php
													$s = explode(",",$product->size)
												@endphp
												<option value="">Size</option>
												@for ($i = 0; $i < count($s); $i++)
													<option value="{{ $s[$i] }}">{{ $s[$i] }}</option>
												@endfor
											</select>
										</div>
									</div>
									<div class="variation-row">
										<label>Color</label>
										<div class="inner value">
											<select id="color">
												@php
													$color = explode(",",$product->color)
												@endphp
												<option value="">Color</option>
												@for ($i = 0; $i < count($color); $i++)
													<option value="{{ $color[$i] }}">{{ $color[$i] }}</option>
												@endfor
											</select>
										</div>
									</div>
								</div>
								<div class="variations_button">
									<input type="text" id="id" value="{{ $product->id }}">
									<div class="quantity">
										<a class="quantity-minus" href="#">-</a>
										<input type="text" data-min="5" data-max="10" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
										<a class="quantity-plus" href="#">+</a>
									</div>
									<button type="button" class="single_add_to_cart_button button alt" onclick="add_to_cart()">Add to cart</button>
								</div>
								<div class="product_meta">
									{{-- <span class="sku_wrapper">SKU: <span class="sku">201623469</span></span> --}}
									<span class="posted_in">Category: <a href="#" rel="tag">{{ $product->category->name }}</a></span>
									{{-- <span class="tags">Tags: <a href="#" rel="tag">Accessories,men,Women</a></span> --}}
								</div>
								<div class="share">
			                        <a href="#"><i class="fa fa-facebook"></i></a>
			                        <a href="#"><i class="fa fa-twitter"></i></a>
			                        <a href="#"><i class="fa fa-google-plus"></i></a>
			                        <a href="#"><i class="fa fa-instagram"></i></a>
			                        <a href="#"><i class="fa fa-pinterest"></i></a>
			                    </div>
			                    <div class="woocommerce-tabs">
									<ul class="tabs wc-tabs nav-tab">
										<li class="description_tab active">
											<a data-toggle="tab" href="#tab-description">Description</a>
										</li>
										<li class="additional_information_tab">
											<a data-toggle="tab" href="#tab-additional_information">DETAILS</a>
										</li>
										<li class="reviews_tab">
											<a data-toggle="tab" href="#tab-reviews">Reviews (2)</a>
										</li>
									</ul>
									<div class="tab-container">
										<div id="tab-description" class="tab-panel active">
											<p>{{ $product->description }}</p>
										</div>
										<div id="tab-additional_information" class="tab-panel">
											<table class="shop_attributes">
												<tbody>
													<tr class="">
														<th>Brand: </th>
														<td><p>{{ $product->brand }}</p></td>
													</tr>
													<tr class="alt">
														<th>Fabric:</th>
														<td><p>{{ $product->fabric }}</p></td>
													</tr>
													<tr class="alt">
														<th>Dimensions:</th>
														<td><p>{{ $product->size }}</p></td>
													</tr>
													<tr class="alt">
														<th>Weight:</th>
														<td><p>{{ $product->weight }}</p></td>
													</tr>
												</tbody>
											</table>
										</div>
										{{-- <div  id="tab-reviews" class="tab-panel">
											<div id="reviews">
												<div id="comments">
													<h2>2 review for SPORT SHOES</h2>
													<ol class="commentlist">
														<li class="comment">
															<div class="comment_container">
																<img alt="" src="http://1.gravatar.com/avatar/17f38c2b7301299a345f8ec6fcaa66ea?s=60&amp;d=mm&amp;r=g" srcset="http://1.gravatar.com/avatar/17f38c2b7301299a345f8ec6fcaa66ea?s=120&amp;d=mm&amp;r=g 2x" class="avatar avatar-60 photo" height="60" width="60">
																<div class="comment-text">
																	<div class="meta">
																		<strong >JAMIE FOX</strong> – 
																		<time datetime="2013-06-07T13:01:25+00:00">January 22, 2016</time>
																		<div class="rating" title="Rated 3 out of 5">
																			<i class="active fa fa-star"></i>
																			<i class="active fa fa-star"></i>
																			<i class="active fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																		</div>								
																	</div>
																	<div class="description">
																		<p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
																	</div>
																</div>
															</div>
														</li>
														<li class="comment">
															<div class="comment_container">
																<img alt="" src="http://1.gravatar.com/avatar/17f38c2b7301299a345f8ec6fcaa66ea?s=60&amp;d=mm&amp;r=g" srcset="http://1.gravatar.com/avatar/17f38c2b7301299a345f8ec6fcaa66ea?s=120&amp;d=mm&amp;r=g 2x" class="avatar avatar-60 photo" height="60" width="60">
																<div class="comment-text">
																	<div class="meta">
																		<strong>MARTIN LUTHER KING</strong> – 
																		<time datetime="2013-06-07T13:01:25+00:00">January 22, 2016</time>
																		<div class="rating" title="Rated 3 out of 5">
																			<i class="active fa fa-star"></i>
																			<i class="active fa fa-star"></i>
																			<i class="active fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																		</div>								
																	</div>
																	<div class="description">
																		<p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
																	</div>
																</div>
															</div>
														</li>
													</ol>
												</div>
												<div id="review_form">
													<div class="comment-respond">
														<h3 id="reply-title" class="comment-reply-title">Add a review</h3>
														<form action="http://kutethemes.net/wordpress/boutique/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">
															<div class="comment-form-rating">
																<label>Your Rating</label>
																<p class="stars selected">
																	<span>
																		<a class="star-1" href="#">1</a>
																		<a class="star-2" href="#">2</a>
																		<a class="star-3" href="#">3</a>
																		<a class="star-4" href="#">4</a>
																		<a class="star-5 active" href="#">5</a>
																	</span>
																</p>
															</div>
															<p class="comment-form-comment">
																<label for="comment">Your Review</label>
																<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
															</p>
															<p class="comment-form-author">
																<label for="author">Name <span class="required">*</span></label>
																<input id="author" name="author" type="text" value="" size="30" aria-required="true">
															</p>
															<p class="comment-form-email">
																<label for="email">Email <span class="required">*</span></label> 
																<input id="email" name="email" type="text" value="" size="30" aria-required="true">
															</p>
															<p class="form-submit">
																<input name="submit" type="submit" id="submit" class="submit" value="Submit"> 
															</p>				
														</form>
													</div>
												</div>
											</div>
										</div> --}}
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="related products">
					<h3 class="title">Related Products</h3>
					<ul class="product-list owl-carousel nav-center-center" data-loop="true" data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"}}'>
						@foreach ($rproducts as $rproduct)
						<li class="product-item">
							<div class="product-inner">
								<div class="flash">
									<span class="sale">Sale</span>
								</div>
								<div class="thumb">
									<a class="product-image" href="#"><img src="{{asset('assets/home')}}/images/products/2.jpg" alt=""></a>
									<div class="group-buttons">
										<a href="#" class="button add_to_cart_button">Add to cart</a>
										<a href="#" class="button yith-wcqv-button">Quickview</a>
										<div class="yith-wcwl-add-to-wishlist add-to-wishlist-70">
											    <div class="yith-wcwl-add-button show">
													<a href="#" rel="nofollow"> Wishlist</a>
												</div>
											    <div class="yith-wcwl-wishlistaddedbrowse hide">
											        <span class="feedback">Product added!</span>
											        <a href="#">Browse Wishlist</a>
											    </div>
											    <div class="yith-wcwl-wishlistexistsbrowse hide">
											        <span class="feedback">The product is already in the wishlist!</span>
											        <a href="#" rel="nofollow">Browse Wishlist</a>
											    </div>
										</div>
									</div>
								</div>
								<div class="info">
									<h3 class="product-name"><a href="#">SAFFIANO-LEATHER LACE-UP  BOOTS</a></h3>
									<span class="price">
										<del>$200.00</del>
										<ins>$179.00</ins>
									</span>
									<div class="rating">
										<i class="active fa fa-star"></i>
										<i class="active fa fa-star"></i>
										<i class="active fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
							</div>
						</li>
						@endforeach
						{{-- <li class="product-item">
							<div class="product-inner">
								<div class="thumb">
									<a class="product-image" href="#"><img src="{{asset('assets/home')}}/images/products/3.jpg" alt=""></a>
									<div class="group-buttons">
										<a href="#" class="button add_to_cart_button">Add to cart</a>
										<a href="#" class="button yith-wcqv-button">Quickview</a>
										<div class="yith-wcwl-add-to-wishlist add-to-wishlist-70">
											    <div class="yith-wcwl-add-button show">
													<a href="#" rel="nofollow"> Wishlist</a>
												</div>
											    <div class="yith-wcwl-wishlistaddedbrowse hide">
											        <span class="feedback">Product added!</span>
											        <a href="#">Browse Wishlist</a>
											    </div>
											    <div class="yith-wcwl-wishlistexistsbrowse hide">
											        <span class="feedback">The product is already in the wishlist!</span>
											        <a href="#" rel="nofollow">Browse Wishlist</a>
											    </div>
										</div>
									</div>
								</div>
								<div class="info">
									<h3 class="product-name"><a href="#">B&W SWEATSHIRT</a></h3>
									<span class="price">
										$179.00
									</span>
								</div>
							</div>
						</li>
						<li class="product-item">
							<div class="product-inner">
								<div class="thumb">
									<a class="product-image" href="#"><img src="{{asset('assets/home')}}/images/products/4.jpg" alt=""></a>
									<div class="group-buttons">
										<a href="#" class="button add_to_cart_button">Add to cart</a>
										<a href="#" class="button yith-wcqv-button">Quickview</a>
										<div class="yith-wcwl-add-to-wishlist add-to-wishlist-70">
											    <div class="yith-wcwl-add-button show">
													<a href="#" rel="nofollow"> Wishlist</a>
												</div>
											    <div class="yith-wcwl-wishlistaddedbrowse hide">
											        <span class="feedback">Product added!</span>
											        <a href="#">Browse Wishlist</a>
											    </div>
											    <div class="yith-wcwl-wishlistexistsbrowse hide">
											        <span class="feedback">The product is already in the wishlist!</span>
											        <a href="#" rel="nofollow">Browse Wishlist</a>
											    </div>
										</div>
									</div>
								</div>
								<div class="info">
									<h3 class="product-name"><a href="#">B&W SWEATSHIRT</a></h3>
									<span class="price">
										$179.00
									</span>
								</div>
							</div>
						</li>
						<li class="product-item">
							<div class="product-inner">
								<div class="flash">
									<span class="new">New</span>
								</div>
								<div class="thumb">
									<a class="product-image" href="#"><img src="{{asset('assets/home')}}/images/products/5.jpg" alt=""></a>
									<div class="group-buttons">
										<a href="#" class="button add_to_cart_button">Add to cart</a>
										<a href="#" class="button yith-wcqv-button">Quickview</a>
										<div class="yith-wcwl-add-to-wishlist add-to-wishlist-70">
											    <div class="yith-wcwl-add-button show">
													<a href="#" rel="nofollow"> Wishlist</a>
												</div>
											    <div class="yith-wcwl-wishlistaddedbrowse hide">
											        <span class="feedback">Product added!</span>
											        <a href="#">Browse Wishlist</a>
											    </div>
											    <div class="yith-wcwl-wishlistexistsbrowse hide">
											        <span class="feedback">The product is already in the wishlist!</span>
											        <a href="#" rel="nofollow">Browse Wishlist</a>
											    </div>
										</div>
									</div>
								</div>
								<div class="info">
									<h3 class="product-name"><a href="#">B&W SWEATSHIRT</a></h3>
									<span class="price">
										$179.00
									</span>
								</div>
							</div>
						</li> --}}
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('page-js')
	<script src="{{ asset('assets\home\vendor\gallery-zoom-zoomy\dist\zoomy.js') }}"></script>
@endsection
@section('custom-js')
	<script>
		var images = {!! str_replace("'", "\'", json_encode($product->images)) !!};
		var url = [];
		for (i = 0; i < images.length; i++) {
				url.push("../../storage/app/public/product/"+images[i].image);
		}
		// $('#myGallery').zoomy(url);
		$('#myGallery').zoomy(url, {
			height: 700,
    		width: 710,
			thumbLeft:true,
			thumbRight:true
		});

	</script>
	<script src="{{asset('assets\home\custom.js')}}"></script>
@endsection
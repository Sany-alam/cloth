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
								<div class="variations">
									<div class="variation-row">
										<label>Size</label>
										<div class="inner value">
											@php
												$s = explode(",",$product->size)
                                                @endphp
											<select id="size">
                                                <option value="">Size</option>
												@for ($i = 0; $i < count($s); $i++)
												<option value="{{ $s[$i] }}">{{ $s[$i] }}</option>
												@endfor
											</select>
										</div>
									</div>
								</div>
								<div class="variations">
									<div class="variation-row">
										<label>Color</label>
										<div class="inner value">
											@php
												$c = explode(",",$product->color)
                                            @endphp
											<select id="color">
                                                <option value="">Color</option>
												@for ($i = 0; $i < count($c); $i++)
												<option value="{{ $c[$i] }}">{{ $c[$i] }}</option>
												@endfor
											</select>
										</div>
									</div>
								</div>
								<div class="variations_button">
									<input type="hidden" id="id" value="{{ $product->id }}">
									<div class="quantity">
										<a id="quantity-sub" class="quantity-minus" href="javascript:void(0)">-</a>
										<input id="quantity" type="text" class="input-text qty text" value="1">
										<a id="quantity-add" class="quantity-plus" href="javascript:void(0)">+</a>
									</div>
									<button type="button" class="single_add_to_cart_button button alt" id="add_to_cart">Add to cart</button>
								</div>
								<div class="product_meta">
									{{-- <span class="sku_wrapper">SKU: <span class="sku">201623469</span></span> --}}
									<span class="posted_in"><a href="{{ url('products/'.$product->subcategory->id.'') }}" rel="tag">{{ $product->subcategory->name }}</a></span>
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
										{{-- <li class="reviews_tab">
											<a data-toggle="tab" href="#tab-reviews">Reviews (2)</a>
										</li> --}}
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
				@if ($product->subcategory->products->count() > 1)
				<div class="related products">
					<h3 class="title">Related Products</h3>
					<ul class="product-list owl-carousel nav-center-center" data-loop="true" data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"}}'>
						@foreach ($product->subcategory->products->except($product->id) as $related_product)
							@if($related_product)
								<script>
									$(".title").hide();
								</script>
							@endif
							@if ($product->subcategory->products->count() == 1)
								hello
							@endif
							<li class="product-item">
								<div class="product-inner">
									@if ($related_product->stock == false)
										<div class="flash">
											<span class="sale">Sale</span>
										</div>
									@endif
									<div class="thumb">
										<a class="product-image" href="#"><img src="{{asset('/storage/app/public/product/'.$related_product->images[0]->image) }}" alt=""></a>
										<div class="group-buttons">
											<a href="javascript:void(0)" onclick="add_to_cart({{$related_product->id}})" class="button add_to_cart_button">Add to cart</a>
											<a href="{{ url('/product/no/'.$related_product->id) }}" class="button yith-wcqv-button">Quickview</a>
											<div class="yith-wcwl-add-to-wishlist add-to-wishlist-70">
												{{-- <div class="yith-wcwl-add-button show">
													<a href="#" rel="nofollow"> Wishlist</a>
												</div> --}}
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
										<h3 class="product-name"><a href="#">{{ $related_product->name }}</a></h3>
										<span class="price">
											<del>{{ $related_product->price*1.2 }}</del>
											<ins>{{ $related_product->price }}Tk</ins>
										</span>
										{{-- <div class="rating">
											<i class="active fa fa-star"></i>
											<i class="active fa fa-star"></i>
											<i class="active fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div> --}}
									</div>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
@section('page-js')
	<script src="{{ asset('assets\home\vendor\gallery-zoom-zoomy\dist\zoomy.js') }}"></script>
	<script>
		// $(".single_add_to_cart_button").click(function() {
		// 	alert($("#id").val()+" "+$("#quantity").val()+" "+$("#color").val()+" "+$("#size").val())
		// })

		// var product_id = $("#id").val();
		// var product_quantity = $("#quantity").val();
		// var product_size = $("#size").val();
		// var product_color = $("#color").val();

	</script>
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
			height: 420,
			// width: 100,
			// thumbLeft:true,
			thumbRight:true
		});
	</script>
@endsection

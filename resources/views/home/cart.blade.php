@extends('home.app')
@section('page-css')
	
<!-- <link type="text/css" rel="stylesheet" href="{{asset('assets\home\vendor\gallery-zoom-zoomy\dist\zoomy.css')}}" /> -->
@endsection
@section('content')

	<div class="page-heading-wapper">
		<div class="container">
			<h1 class="page-heading">Cart</h1>
		</div>
	</div>
	<div class="page-content main-container no-sidebar">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 main-content">
					<table class="shop_table cart">
						<thead>
							<tr>
								<th colspan="2" class="product">Product name</th>
								<th class="product">Size</th>
								<th class="product">Color</th>
								<th class="product-price">Price</th>
								<th class="product-quantity">QUANTITY</th>
								<th class="product-subtotal">Total</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="cart-list">
							<!-- <tr>
								<td class="product-thumbnail">
									<img class="product-thumb" src="images/products/14.jpg" alt="">
								</td>
								<td class="product-name">
									<a class="name" href="#">Happy Ninja </a>
								</td>
								<td class="product-price">
									<span class="amount">$15.13</span>
								</td>
								<td class="product-quantity">
									<div class="quantity">
										<a class="quantity-minus" href="#">-</a>
										<input type="text" data-step="1" data-min="" data-max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
										<a class="quantity-plus" href="#">+</a>
									</div>
								</td>
								<td class="product-subtotal">
									<span class="amount">$113.00</span>
								</td>
								<td class="product-remove">
									<a class="remove" href="#"><i class="fa fa-close"></i></a>
								</td>
							</tr> -->
						</tbody>
					</table>
					<div class="carttable-footer">
						<div class="row">
							<div class="col-sm-6">
								<div class="coupon">
									<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
									<input type="submit" class="button" name="apply_coupon" value="Apply Coupon">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="cart-control">
									<a class="button" href="javascript:void(0)" onclick="AllClearCart()">CLEAR CART</a>
									<input type="submit" class="button" name="apply_coupon" value="UPDATE CART">
									<a href="{{url('/checkout')}}" class="button primary">PROCEED TO CHECKOUT</a>
								</div>
							</div>

							
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="form-shipping">
								<h3 class="form-title">CALCULATE SHIPPING</h3>
								<p>
									<input type="text" placeholder="SERBIA">
								</p>
								<p>
									<input type="text" placeholder="STATE / COUNTY">
								</p>
								<p>
									<input type="text" placeholder="POSTCODE">
								</p>
								<button class="button">UPDATE TOTALS</button>
							</div>
						</div>
						<div class="col-sm-2 col-md-12 col-lg-2 hiden-md"></div>
						<div class="col-sm-6 col-md-6 col-lg-4">
							<div class="cart_totals">
								<h3 class="form-title">Cart Totals</h3>
								<table class="shop_table">
									<tr class="cart-subtotal">
										<td>Subtotal</td>
										<td data-title="Subtotal"><span class="amount">€&nbsp;46.28</span></td>
									</tr>
									<tr class="shipping">
										<td>Shipping</td>
										<td>Free Shipping </td>
									</tr>
									<tr class="order-total">
										<td>Total</td>
										<td data-title="Total"><strong><span class="amount">$46.28</span></strong></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('page-js')
	<!-- <script src="{{ asset('assets\home\vendor\gallery-zoom-zoomy\dist\zoomy.js') }}"></script> -->
@endsection
@section('custom-js')
	<script>


	</script>
@endsection
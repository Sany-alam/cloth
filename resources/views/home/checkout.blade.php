@extends('home.app')
@section('page-css')
	
<link type="text/css" rel="stylesheet" href="{{asset('assets\home\vendor\gallery-zoom-zoomy\dist\zoomy.css')}}" />
@endsection
@section('content')


	<div class="page-heading-wapper">
		<div class="container">
			<h1 class="page-heading">CHECKOUT</h1>
		</div>
	</div>
	<div class="page-content main-container no-sidebar">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 main-content">
					<div class="woocommerce-info">Returning customer? <a href="#" class="showlogin">Click here to login</a></div>
					<form method="post" class="login">
						<p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>

						<p class="form-row form-row-first">
							<label for="username">Username or email <span class="required">*</span></label>
							<input class="input-text" name="username" id="username" type="text">
						</p>
						<p class="form-row form-row-last">
							<label for="password">Password <span class="required">*</span></label>
							<input  class="input-text" name="password" id="password" type="password">
						</p>
						<p class="form-row">
							<input class="button" name="login" value="Login" type="submit">
							<label for="rememberme" class="inline">
								<input name="rememberme" id="rememberme" value="forever" type="checkbox"> Remember me
							</label>
						</p>
						<p class="lost_password">
							<a href="#">Lost your password?</a>
						</p>
					</form>
					<div class="woocommerce-info">Have a coupon? <a href="#" class="showcoupon">Click here to enter your code</a></div>
					<form class="checkout_coupon" method="post">
						<p class="form-row form-row-first">
							<input type="text" name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value="">
						</p>
						<p class="form-row form-row-last">
							<input type="submit" class="button" name="apply_coupon" value="Apply Coupon">
						</p>
					</form>

					<div class="row">
						<div class="col-sm-12 col-md-6">
							<div class="woocommerce-billing-fields">
								<h3 class="form-title">BILLING ADDRESS</h3>
								<p>
									<input id="name" class="input-text" type="text" placeholder="FULL NAME">
								</p>
								<p>
									<input id="address" class="input-text" type="text" placeholder="ADDRESS*">
								</p>
								<p>
									<input id="city" class="input-text" type="text" placeholder="TOWN/CITY*">
								</p>
								<div class="row">
									<div class="col-sm-6">
										<p>
											<input id="state" class="input-text" type="text" placeholder="STATE">
										</p>
									</div>
									<div class="col-sm-6">
										<p>
											<input id="postcode" class="input-text" type="text" placeholder="POSTCODE*">
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<p>
											<input id="email" class="input-text" type="text" placeholder="EMAIL">
										</p>
									</div>
									<div class="col-sm-6">
										<p>
											<input id="phone" class="input-text" type="text" placeholder="PHONE*">
										</p>
									</div>
								</div>
								<p>
									<label><input id="account" type="checkbox">Create an account?</label>
								</p>
							</div>
							<div class="woocommerce-shipping-fields">
								<p>
									<label>ORDER NOTES (Optional)</label>
									<textarea id="note" rows="3" class="input-text" placeholder="Notes about your delivery, e. g.  special notes for delivery."></textarea>
								</p>
							</div>
						</div>
						<div class="col-sm-12 col-md-6">
							<div class="woocommerce-checkout-review-order">
								<h3 class="form-title">YOUR ORDER</h3>
								<table class="shop_table woocommerce-checkout-review-order-table">
									<thead>
										<tr>
											<th class="product-name">Product</th>
											<th class="product-total">Total</th>
										</tr>
									</thead>
									<tbody>
										@php
											$subtotal = 0
										@endphp
										@foreach (session()->get('cart') as $item)
											<tr class="cart_item">
												<td class="product-name">{{$item['name']}}<strong class="product-quantity">× {{$item['quantity']}}</strong> - {{$item['size']}} Size
												</td>
												<td class="product-total">
													<span class="amount">{{$item['price']*$item['quantity']}} Tk</span>
												</td>
											</tr>
											{{$subtotal = $subtotal+$item['price']*$item['quantity']}}
										@endforeach
									</tbody>
									<tfoot>
										<tr class="cart-subtotal">
											<th>Subtotal</th>
											<td><span class="amount">{{$subtotal}} Tk</span></td>
										</tr>
										<tr class="shipping">
											<th>Shipping</th>
											<td data-title="Shipping">
												<p>Free Shipping</p>
											</td>
										</tr>
										<tr class="order-total">
											<th>Total</th>
											<td><strong><span class="amount">{{$subtotal}} Tk</span></strong> </td>
										</tr>
									</tfoot>
								</table>
								<div class="woocommerce-checkout-payment">
									<ul class="wc_payment_methods payment_methods methods">
										<li class="wc_payment_method selected">
											<input id="payment1" class="input-radio" type="radio" name="payment_method" value="Cash On Delivery">
											<label for="payment1">Cash on delivery</label>
											<div class="payment_box">
												<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped until the funds have cleared in our account.</p>
											</div>
										</li>
										<li class="wc_payment_method ">
											<input id="payment2" class="input-radio" type="radio" name="payment_method" value="BKASH">
											<label for="payment2">Bkash Payment</label>
											<div class="payment_box">
												<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped until the funds have cleared in our account.</p>
											</div>
										</li>
										<li class="wc_payment_method ">
											<input id="payment3" class="input-radio" type="radio" name="payment_method" value="BANK">
											<label for="payment3">Direct Bank Transfer</label>
											<div class="payment_box">
												<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped until the funds have cleared in our account.</p>
											</div>
										</li>
									</ul>
								</div>
								<button onclick="placeOrder()" class="button primary alt">PLACE ORDER</button>
							</div>
						</div>
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


	</script>
@endsection
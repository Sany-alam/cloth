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
								<th class="product">Image</th>
								<th class="product">Product name</th>
								<th class="product">Size</th>
								<th class="product">Color</th>
								<th class="product-price">Price</th>
								<th class="product-quantity">QUANTITY</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="cart-list">

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
									<button href="javascript:void(0)" class="button primary" id="checkout">PROCEED TO CHECKOUT</button>
									<a class="button" href="javascript:void(0)" onclick="AllClearCart()">CLEAR CART</a>
								</div>
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

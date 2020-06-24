@extends('home.app')

@section('content')
<div class="container">
    <div class="page-heading-wapper">
		<div class="container">
			<h1 class="page-heading">{{ $sub_cate->name }}</h1>
		</div>
	</div>
    <div class="row" style="margin-top: 50px;">
        @foreach ($sub_cate->products as $product)
            <div class="col-md-3" style="margin-bottom:50px;">
                <div class="product-item">
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
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
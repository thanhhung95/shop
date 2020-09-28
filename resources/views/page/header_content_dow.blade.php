<div id="pick" class="beta-select"><i class="fa fa-shopping-cart"></i>
	Cart <span id="count">({{Cart::count() ?  Cart::count() : 'Trống'}})</span>
	 <i class="fa fa-chevron-down"></i>
</div>
@if(Cart::count() != 0)
<div id="show" class="beta-dropdown cart-body">
	@foreach( Cart::content() as $product)
	<div class="cart-item">
		<div id="dlCart" data-id='{{$product->rowId}}' style=" float: right;font-size: 17px;"><a href="{{$product->rowId}}"><span class="glyphicon glyphicon-remove"></span></a>
		
		</div>
		<div class="media">
			<a class="pull-left" href="#"><img src="source/image/product/{{$product->options->image}}" alt=""></a>
			<div class="media-body">
				<span class="cart-item-title">{{$product->name}}</span>
				
				<span class="cart-item-amount">{{$product->	qty}}*<span> ${{$product->price}}</span></span>
			</div>
		</div>
	</div>
	@endforeach
	<div class="cart-caption">
		<div class="cart-total text-right">Total Price:{{Cart::subtotal()}} <span class="cart-total-value">$ </span></div>
		<div class="clearfix"></div>

		<div class="center">
			<div class="space10">&nbsp;</div>
			<a href="{{route('dathang')}}" class="beta-btn primary text-center">ORDER <i class="fa fa-chevron-right"></i></a>
		</div>
	</div>
</div>
@endif
</div> <!-- .cart -->
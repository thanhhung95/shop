<div class="your-order-item">
	<div>
	<!--  one item	 -->
	
	@foreach(Cart::content() as $product)
		<div class="media">
			<img width="25%" src="source/image/product/{{$product->options->image}}" alt="" class="pull-left">
			<div class="media-body">
				<p class="font-large">{{$product->name}}</p>
				<span class="flash-sale">Price:
				$ {{$product->price}}</span>
					<!-- SL -->
					<span class=" your-order-info">Quantity:
							<input id="odQty" data-id="{{$product->rowId}}" style="width: 50px;margin-top: 20px;" type="number" name="qty" min="1" value="{{$product->qty}}"> 
							<span id="update" name="{{$product->id}}"> update</span>
					<!-- xóa -->
					<div style=" float: right;font-size: 17px;">
						<a id="dlProduct" href="{{$product->rowId}}">
							<span class="glyphicon glyphicon-remove">
							</span>
						</a>
					</div>
					</span>
				
				
			</div>
		</div>
	<!-- end one item -->
	@endforeach
	
	</div>
	<div class="clearfix"></div>
</div>
<div class="your-order-item">
	<div class="pull-left"><p class="your-order-f18">Total Price:</p></div>
	<div class="pull-right"><h5 class="color-black">
		${{Cart::subtotal()}}
	</h5></div>
	<div class="clearfix"></div>
</div>
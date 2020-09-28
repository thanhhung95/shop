@extends('master')

@section('content')
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn-online').on('click',function(){
        	$('.btn-order-two').show();
        	$('.btn-order-one').hide();

		});
		$('#pick-again').click(function(){
			$('.btn-order-two').hide();
			$('.btn-order-one').show();
		});
	});
</script>

<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">ORDER</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('index')}}">Home</a> / <span>ORDER</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			@if(Session::has('thongbao'))
				<div class="alert alert-success "> {{Session::get('thongbao')}}</div>
			@endif	

			<form action="{{route('test')}}" method="post" class="beta-form-checkout">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-sm-6">
						<h4>Billing Address</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Name*</label>
							<input type="text" id="name" name="name" placeholder="Full Name" required>
						</div>
						<div class="form-block">
							<label>Gender </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Men</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Women</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required placeholder="expample@gmail.com">
						</div>

						<div class="form-block">
							<label for="address">Address*</label>
							<input type="text" id="address" name="address" placeholder="Street Address" required>
						</div>
						

						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Note</label>
							<textarea id="notes" name="notes"></textarea>
						</div>

					</div>
				
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Your ORDER</h5></div>
							<div id="orderContent" class="your-order-body" style="padding: 0px 10px">
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
										${{number_format(Cart::subtotal(),0)}}
									</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Payment Method</h5></div>
							
							<div>
								<button type="submit" class="btn-order-one btn btn-warning btn-md">
								<p>THANH TOÁN KHI NHẬN HÀNG</p>
								</button>
								<button id="btn-online" type="button" class="btn-order-one btn btn-primary btn-md">
								<p>THANH TOÁN ONLINE</p>
								</button>
								<button type="button" class="btn-order-two btn btn-success btn-md">
								<p>NGÂN HÀNG BẢO KIM</p>
								</button>
								<button type="button" class="btn-order-two btn btn-primary btn-md">
								<a style="color: white;" target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=phamthanhhung95tn@gmail.com&product_name=123123&price={{number_format(Cart::subtotal(),0)*23000}}&return_url=http://localhost/shop/public/index&comments=@foreach(Cart::content() as $sp){{$sp->name}}(SL:{{$sp->qty}})@endforeach"><p>NGÂN HÀNG NGÂN LƯỢNG</p></a>
								</button>
								<div id="pick-again">
									<span>Chọn lại hình thức thanh toán</span>
								</div>	
							</div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
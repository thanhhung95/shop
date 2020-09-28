@extends('master')


@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Product</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('index')}}">Home</a> / <span>Product</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$sanpham->name}}</p>
								<p class="single-item-price">
									@if($sanpham->promotion_price== 0)
										<span style="font-size: 25px;" >${{$sanpham->unit_price}}</span>
									@else
										<span style="font-size: 25px;" class="flash-del">${{$sanpham->unit_price}}</span>
										<span style="font-size: 23px;"  class="flash-sale">${{$sanpham->promotion_price}}</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

						
							<div class="single-item-options">
								
								<a class="add-to-cart" href="{{$sanpham->id}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Orther Products</h4>

						<div class="row">
							@foreach($sanpham_khac as $sp_khac)
							<div class="col-sm-4">
								<div class="single-item">
									@if($sp_khac->promotion_price!= 0)
										<div class="ribbon-wrapper">
											<div class="ribbon sale">Sale</div>
										</div>
										@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sp_khac->id)}}"><img src="source/image/product/{{$sp_khac->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sp_khac->name}}</p>
										<p class="single-item-price">
											@if($sp_khac->promotion_price== 0)
												<span>${{$sp_khac->unit_price}}</span>
											@else
											<span  class="flash-del">${{$sp_khac->unit_price}}</span>
											<span class="flash-sale">${{$sp_khac->promotion_price}}</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{$sp_khac->id}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$sp_khac->id)}}">detail<i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
							<div class="row">{{$sanpham_khac->links()}}</div>
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sp_sell as $sell)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{{route('chitietsanpham',$sell->id)}}}"><img src="source/image/product/{{$sell->image}}" alt=""></a>
									<div class="media-body">
										{{$sell->name}} <br>
										<span style="font-size: 15px;" class="beta-sales-price">$ {{$sell->promotion_price}}</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sp_new as $new )
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt=""></a>
									<div class="media-body">
										{{$new->name}} <br>
										<span style="font-size:15px;" class="beta-sales-price">${{$new->unit_price}}</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
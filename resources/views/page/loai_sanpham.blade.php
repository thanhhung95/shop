@extends('master')



@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Products</h6>
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
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($danhmuc as $dm)
							<li><a href="{{route('loaisanpham',$dm->id)}}">{{$dm->name}}</a></li>
							@endforeach	
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							@foreach($loai as $type)
							<h4>{{$type->name}}</h4>
							@endforeach
							<div class="beta-products-details">
								<p class="pull-left">{{count($type_product)}} styles found</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($type_product as $chunk )
									@foreach( $chunk as $loai_sp)
								<div style="margin-bottom: 30px;" class="col-sm-4">
									<div class="single-item">
										@if($loai_sp->promotion_price!= 0)
										<div class="ribbon-wrapper">
											<div class="ribbon sale">Sale</div>
										</div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$loai_sp->id)}}">
												<img src="source/image/product/{{$loai_sp->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$loai_sp->name}}</p>
											<p class="single-item-price">
												@if($loai_sp->promotion_price== 0)
													<span>${{$loai_sp->unit_price}}</span>
													@else
													<span class="flash-del">${{$loai_sp->unit_price}}</span>
													<span class="flash-sale">${{$loai_sp->promotion_price}}</span>
													
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{$loai_sp->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$loai_sp->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
									@endforeach
								@endforeach
							</div>
							
						</div> <!-- .beta-products-list -->

						<div class="beta-products-list">
							
							<h4>Other Product</h4>
							
							<div class="beta-products-details">
								<p class="pull-left">{{count($sanpham_khac)}} styles found</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sanpham_khac as $sp_khac)
								<div style="margin-bottom: 30px;" class="col-sm-4">
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
													<span class="flash-del">${{$sp_khac->unit_price}}</span>
													<span class="flash-sale">${{$sp_khac->promotion_price}}</span>
													
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{$sp_khac->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sp_khac->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{$sanpham_khac->links()}}</div>
						</div> <!-- .beta-products-list -->

						
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
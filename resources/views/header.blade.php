<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
							<li><a href="#"><i class="fa fa-user"></i>{{Auth::user()->full_name}}</a></li>
							<li><a href="{{route('dangky')}}">Signup</a></li>
							<li><a href="{{route('logout')}}">Logout</a></li>
						@else
							<li><a href="#"><i class="fa fa-user"></i>Account</a></li>
							<li><a href="{{route('dangky')}}">Signup</a></li>
							<li><a href="{{route('dangnhap')}}">Login</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('index')}}" id="logo"><img style="height:150px;width: 150px;" src="source/assets/dest/images/logo-univi.gif" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
							{{ csrf_field() }}
					        <input type="text" value="" name="tukhoa" id="s" placeholder="Search..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div id="hDropdown" class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i>
								Cart <span id="count">({{Cart::count() ?  Cart::count() : 'Trống'}})</span>
								 <i class="fa fa-chevron-down"></i>
							</div>
							@if(Cart::count() != 0)
							<div class="beta-dropdown cart-body">
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
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #333;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('index')}}">Home</a></li>
						<li><a >Product</a>
							<ul class="sub-menu">
								@foreach($loai_sp as $loai)
								<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{url('gioi_thieu')}}">About</a></li>
						<li><a href="{{url('lien_he')}}">Contact</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
		</div> <!-- #header -->
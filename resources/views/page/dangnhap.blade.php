@extends('master')

@section('content')
<div class="inner-header">
		<div class="container">
			@if(Session::has('thatbai'))
			<div style="font-size:20px;" class="alert alert-success" >
				{{Session::get('thatbai')}}
			</div>
			@endif
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('index')}}">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('postdangnhap')}}" method="post" class="beta-form-checkout">

				{{ csrf_field() }}
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="text">Name*</label>
							<input type="text" name="name" id="email" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="text" id="phone" name="password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
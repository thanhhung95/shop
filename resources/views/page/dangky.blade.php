@extends('master')

@section('content')
	<div class="inner-header">
		<div class="container">
			@if(Session::has('add_user'))
            	<div class="alert alert-success " >{{Session::get('add_user')}}</div>
            @endif

           @if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
			@endif
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('post_add_user')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input class="form-control" name="email" type="email" id="email" value="{!! old ('email')!!}">
						</div>

						<div class="form-block">
							<label for="your_last_name">Tài khoản*</label>
							<input class="form-control" name="name" type="text" id="your_last_name" value="{!! old ('name')!!}" >
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input class="form-control" name="address" type="text" id="adress" value="{!! old ('address')!!}">
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input class="form-control" name="phone" type="number" min="1" id="phone" value="{!! old ('phone')!!}">
						</div>
						<div class="form-block">
							<label for="Password">Password*</label>
							<input class="form-control" name="password" type="password">
						</div>
						<div class="form-block">
							<label for="Password">Password Again*</label>
							<input class="form-control" name="passwordAgain" type="password">
						</div>
						
							<input type="hidden" name="quyen" value="0">
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
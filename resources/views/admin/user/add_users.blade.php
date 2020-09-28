@extends('admin.layout.index')
@section('contentadmin')
 @if(Auth::check())
<div id="page-wrapper">
            <div class="container-fluid">
                @if(Session::has('add_user'))
                <div class="alert alert-success " >{{Session::get('add_user')}}</div>
                @endif
                @if(Session::has('thongbao'))
                <div class="alert alert-success " >{{Session::get('thongbao')}}</div>
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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài Khoản
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('post_add_user')}}" method="POST">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="name" placeholder="Nhập tài khoản" value="{!! old('name') !!}" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu"  />
                            </div>
                            <div class="form-group">
                                <label>Password Again</label>
                                <input type="password" class="form-control" name="passwordAgain" placeholder="Nhập mật khẩu"  />
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Số điện thoại" value="{!! old('phone') !!}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập Email" value="{!! old('email') !!}" />
                            </div>
                             <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="{!! old('address') !!}" />
                            </div>
                            <div class="form-group">
                                <label>Cấp quyền</label>
                                <select class="form-control" name="quyen">
                                    <option value="0">Khách hàng</option>
                                    <option value="1">Admin</option> 
                                </select><br>
                            </div>
                            
                            <button type="submit" class="btn btn-default">User Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endif
@endsection
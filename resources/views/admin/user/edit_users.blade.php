@extends('admin.layout.index')
@section('contentadmin')
 @if(Auth::check())
<div id="page-wrapper">
            <div class="container-fluid">
                @if(Session::has('edit_user'))
                    <div class="alert alert-success " >{{Session::get('edit_user')}}</div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài Khoản
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('post_edit_user',$user->id)}}" method="POST">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="name" value="{{$user->full_name}}"  disabled />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" value="{{$user->address}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" />
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" value="{{$user->phone}}" />
                            </div>
                             <div class="form-group">
                                <label>Cấp quyền</label>
                                <select class="form-control" name="quyen">
                                    @if($user->quyen == 1)
                                        <option selected value="1">Admin</option>
                                        <option value="0">Khách hàng</option> 
                                    @else
                                        <option value="1">Admin</option>
                                        <option selected value="0">Khách hàng</option>
                                    @endif
                                </select><br>
                            </div>
                            <button type="submit" class="btn btn-default">User Edit</button>
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

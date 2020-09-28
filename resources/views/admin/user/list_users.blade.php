@extends('admin.layout.index')
@section('contentadmin')
 @if(Auth::check())
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div id="content-delete"> <!-- CONTENT DELETE USER AJAX -->
                        <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tài khoản</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Địa chỉ</th>
                                <th>Cấp quyền</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <?php $i = 1; ?>
                        @foreach($user as $users)
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>{{$i++}}</td>
                                <td>{{$users->full_name}}</td>
                                <td>{{$users->email}}</td>
                                <td>{{$users->phone}}</td>
                                <td>{{$users->address}}</td>
                                <td>
                                    @if($users->quyen == 1)
                                        Admin
                                    @else
                                        Khách Hàng
                                    @endif
                                </td>
                                <td  class="center "><i class="fa fa-trash-o  fa-fw"></i><a class="delete-user"  href="{{$users->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('edit_user',$users->id)}}">Edit</a></td>
                            </tr>
                           
                        </tbody>
                        @endforeach
                    </table>   
                    </div>
                    <div class="remove">
                        
                    </div>
                </div>
                <div class="row" >{{$user->links()}} </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endif
@endsection
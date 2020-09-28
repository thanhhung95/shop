@extends('admin.layout.index')
@section('contentadmin')
 @if(Auth::check())
<div id="page-wrapper">
            <div class="container-fluid">
                @if(Session::has('delete_sp'))
                <div class="alert alert-success" >{{Session::get('delete_sp')}}</div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Loại</th>
                                <th>Mô tả</th>
                                <th>Giá</th>
                                <th>Giá Khuyến Mãi</th>
                                <th>Ảnh</th>
                                <th>Đơn vị</th>
                                <th>Tình trạng</th>
                                <th>Xóa</th>
                                <th>Sửa</th>

                            </tr>
                        </thead>
                        @foreach($sanpham as $sp)
                        <tbody>

                            <tr class="odd gradeX" align="center">
                                <td>{{$sp->id}}</td>
                                <td>{{$sp->name}}</td>
                                <td>{{$sp->produc_type->name}}</td>
                                <td>{{$sp->description}}</td>
                                <td>${{$sp->unit_price}}</td>
                                <td>${{$sp->promotion_price}}</td>
                                <td> <img style="height: 60px;width: 50px;" src="source/image/product/{{$sp->image}}"> </td>
                                <td>{{$sp->unit}}</td>
                                @if($sp->new == 1)
                                <td>Mới</td>
                                @else
                                <td>Cũ</td>
                                @endif
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('delete_sp',$sp->id)}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('edit_sp',$sp->id)}}">Edit</a></td>
                            </tr>
                            
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="row">{{$sanpham->links()}}</div>
                <!-- /.row -->
            </div>

            <!-- /.container-fluid -->
</div>
@endif
@endsection
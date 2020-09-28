@extends('admin.layout.index')
@section('contentadmin')
@if(Auth::check())
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách đơn hàng
                            
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên người Order</th>
                                <th>Địa chỉ </th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Ngày đặt</th>
                                <th>Chi tiết</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bill as $dh)
                            <tr class="odd gradeX" align="center">
                                
                                <td>{{$dh->customer->id}}</td>
                                <td>{{$dh->customer->name}}</td>
                                <td>{{$dh->customer->address}}</td>
                                <td>{{$dh->customer->phone_number}}</td>
                                <td>{{$dh->customer->email}}</td>
                                <td>{{$dh->date_order}}</td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('detail_dh',$dh->id)}}">Detail</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('delete_donhang',$dh->id)}}"> Delete</a></td>
                               
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </div>
@endif
@endsection
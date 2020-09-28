@extends('admin.layout.index')
@section('contentadmin')
 @if(Auth::check())
<div id="page-wrapper">
            <div class="container-fluid">
                @if(Session::has('edit_sp'))
                <div class="alert alert-success" >{{Session::get('edit_sp')}}</div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('post_Edit_sp',$sanpham->id)}}" method="POST" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{$sanpham->name}}" />
                            </div>
                             <div class="form-group">
                                <label>Loại</label>
                                <select name="loai" class="form-control">
                                    @foreach($loaisanpham as $lsp)
                                    @if($sanpham->id_type == $lsp->id)
                                    <option selected value="{{$lsp->id}}">{{$lsp->name}}</option>
                                    @elseif($sanpham->id_type != $lsp->id)
                                    <option value="{{$lsp->id}}">{{$lsp->name}}</option>
                                    @endif
                                    
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input class="form-control" name="unit_price" value="{{$sanpham->unit_price}}"  />
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mãi sản phẩm</label>
                                <input class="form-control" name="promotion_price" value="{{$sanpham->promotion_price}}" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control" name="description" value="{{$sanpham->description}}" />
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" value="{{$sanpham->image}}" name="image">
                                
                            </div>
                            <div class="form-group">
                                <label>Đơn vị</label>
                                <input class="form-control" name="unit" value="{{$sanpham->unit}}"  />
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <select name="tinhtrang" class="form-control">
                                    
                                    @if($sanpham->new == 0)
                                    <option selected value="0">Like new</option>
                                    <option value="1">New</option>
                                    @else
                                        <option  value="0">Like new</option>
                                        <option  selected value="1">New</option>
                                    @endif
               
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Product Edit</button>
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
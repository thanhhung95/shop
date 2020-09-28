@extends('admin.layout.index')
@section('contentadmin')
 @if(Auth::check())
<div id="page-wrapper">
            <div class="container-fluid">
                @if(Session::has('thanhcong'))
                <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('post_Add_sp')}}" method="POST" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Nhập tên sản phẩm" required />
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                <select name="loai" class="form-control">
                                    @foreach($loaisanpham as $lsp)
                                    <option value="{{$lsp->id}}">{{$lsp->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" type="number" name="unit_price" placeholder="Nhập giá sản phẩm" required/>
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mãi</label>
                                <input class="form-control" type="number" name="promotion_price" placeholder="Nhập giá sản phẩm khuyến mãi"required />
                            </div>
                            
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="3" name="description" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="image" required >
                            </div>
                            <div class="form-group">
                                <label>Đơn Vị</label>
                                <input class="form-control"  name="unit" placeholder="Đơn vị sản phẩm" required/>
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <select name="tinhtrang" class="form-control">
                                
                                    <option  value="1">New</option>
                                
                                    <option  value="0">Like New</option>
                                  
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Product Add</button>
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
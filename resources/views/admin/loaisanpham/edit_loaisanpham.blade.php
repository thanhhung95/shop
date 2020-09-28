@extends("admin.layout.index")

@section('contentadmin')
 @if(Auth::check())
<div id="page-wrapper">
            <div class="container-fluid">
                 @if(Session::has('suathanhcong'))
                <div class="alert alert-success " >{{Session::get('suathanhcong')}}</div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('post_edit_lsp',$loaisanpham->id)}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tên loại</label>
                                <input class="form-control" name="name" value="{{$loaisanpham->name}}"/>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control" name="description" value="{{$loaisanpham->description}}"  />
                            </div>
                           
                            <button type="submit" class="btn btn-default">Category Edit</button>
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
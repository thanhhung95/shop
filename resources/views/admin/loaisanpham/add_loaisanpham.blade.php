@extends('admin.layout.index')

@section('contentadmin')
    @if(Auth::check())
        <div id="page-wrapper">
            <div class="container-fluid">
                @if(Session::has('thanhcong'))
                <div class="alert alert-success " >{{Session::get('thanhcong')}}</div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Sản Phẩm
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('post_add_lsp')}}" method="POST">
                           {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tên Loại</label>
                                <input class="form-control" name="name" type="text" placeholder="Nhập tên loại" required/>
                            </div>
                            
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="description" rows="3" required ></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Category Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    @endif
@endsection
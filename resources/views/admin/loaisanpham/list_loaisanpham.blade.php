

@extends('admin.layout.index')

@section('contentadmin')
    @if(Auth::check())
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Sản Phẩm
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Loại</th>
                                <th>Mô Tả</th>
                               
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>

                        @foreach($loaisanpham as $lsp)
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>{{$lsp->id}}</td>
                                <td>{{$lsp->name}}</td>
                                <td>{{$lsp->description}}</td>
                               
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('delete_lsp',$lsp->id)}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('edit_lsp',$lsp->id)}}">Sửa</a></td>
                            </tr>
                            
                        </tbody>

                        @endforeach
                    </table>
                </div>

                <div class="row">{{$loaisanpham->links()}} </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div> 
    @endif


@endsection
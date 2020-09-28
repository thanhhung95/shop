 @extends('admin.layout.index')
 @section('contentadmin')
@if(Auth::check())
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Thông tin khách hàng</h3> 
                        <div class="col-lg-3" >
                            <span> Thông tin người đặt hàng :</span> 
                            <br><br>

                            <span> Địa chỉ người đặt hàng :</span> <br><br>
                            <span> Số điện thoại :</span> <br><br>
                            <span> Email :</span> <br><br>
                            <span> Ngày đặt :</span> <br><br>
                            <span> Ghi chú : </span> <br><br>
                            <span> Kiểu thanh toán : </span> <br><br>
                            
                        </div>
                        <div class="col-lg-3" >
                            <span>{{$khachhang->customer->name}}</span> <br><br>
                            
                            <span>{{$khachhang->customer->address}} </span> <br><br>
                            <span> {{$khachhang->customer->phone_number}}</span> <br><br>
                            <span>{{$khachhang->customer->email}}</span> <br><br>
                            <span>{{$khachhang->date_order}}</span> <br><br>
                            <span>{{$khachhang->customer->note}}</span> <br><br>
                            <span>{{$khachhang->payment}}</span> <br><br>
                            
                        </div>  
                        
                    
                        
                    </div>        

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi tiết đơn hàng
                            
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>ID_SP</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng </th>
                                <th>Giá tiền</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr class="odd gradeX" align="center">
                                
                                <td>
                                @foreach($sanpham as $sp)    
                                    {{$sp->product->id}}<br><br>
                                 @endforeach
                                </td>
                                <td>
                                @foreach($sanpham as $sp)    
                                    {{$sp->product->name}}<br><br>
                                 @endforeach
                                </td>
                                <td>
                                    @foreach($sanpham as $sp)    
                                    {{$sp->quantity}}<br><br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($sanpham as $sp)   

                                    {{$sp->unit_price *$sp->quantity }}<br><br>

                                   
                                    @endforeach
                                </td>

                            </tr>
                            
                        </tbody>

                    </table>
                    <div style="float: right; margin: 0px 20px 50px 0px; font-size:20px;color: red; "> Tổng tiền : ${{$khachhang->total}} </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endif
@endsection
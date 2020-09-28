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
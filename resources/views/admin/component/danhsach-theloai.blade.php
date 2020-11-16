<thead>
<tr align="center">
    <th>ID</th>
    <th>Tên</th>
    <th>Tên không dấu</th>
    <th>Delete</th>
    <th>Edit</th>
</tr>
</thead>
<tbody>
@foreach ($theloai as $tl )
<tr class="odd gradeX" align="center">
    <td>{{$tl->id}}</td>
    <td>{{$tl->Ten}}</td>
    <td>{{$tl->TenKhongDau}}</td>
    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="javascript:" class="tl_delete" data-id="{{$tl->id}}" data-url="{{route('xoa.theloai')}}"> Delete</a></td>
    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/theloai/sua/{{$tl->id}}">Edit</a></td>
</tr>
@endforeach
</tbody>

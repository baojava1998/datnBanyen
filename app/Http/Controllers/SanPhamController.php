<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\TheLoai;

class SanPhamController extends Controller
{
    //
    public function getDanhSach()
    {
        $sanpham = SanPham::all();
        return view ('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
    }
    public function getThem()
    {
        $theloai = TheLoai::all();
        return view ('admin.sanpham.them',['theloai'=>$theloai]);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'Ten'=>'required|unique:SanPham,Ten|min:3|max:100',
            'idTheLoai'=>'required'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên loại tin',//required là có hay k
            'Ten.min'=> 'Tên độ dài phải có từ 3 đến 100 ký tự',
            'Ten.max'=> 'Tên độ dài không được quá 100 ký tự',
            'Ten.unique'=>'Tên loại tin đã tồn tại', // unique kiểm tra có trùng hay k
            'TheLoai'=>'Bạn chưa chọn tên thể loại'
        ]);

        $sanpham = new SanPham;
        $sanpham->Ten = $request->Ten;
        $sanpham->TenKhongDau = changeTitle($request->Ten) ;
        $sanpham->idLoaiSanPham = $request->idTheLoai;
        $sanpham->save();
        return redirect('admin/sanpham/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $theloai = TheLoai::all();
        //$theloai = TheLoai::find($id);
        $sanpham = SanPham::find($id);
        return view ('admin.sanpham.sua',['sanpham'=>$sanpham,'theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id)
    {
        $sanpham = SanPham::find($id);
        $this->validate($request,
        [
            'Ten'=>'required|unique:SanPham,Ten|min:3|max:100'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên thể loại',//required là có hay k
            'Ten.unique'=>'Tên thể loại đã tồn tại', // unique kiểm tra có trùng hay k
            'Ten.min'=> 'Tên độ dài phải có từ 3 đến 100 ký tự',
            'Ten.max'=> 'Tên độ dài không được quá 100 ký tự'

        ]);
        $sanpham->Ten = $request->Ten;
        $sanpham->TenKhongDau = changeTitle($request->Ten) ;
        $sanpham->idLoaiSanPham = $request->TheLoai;
        $sanpham->save();

        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $sanpham = SanPham::find($id);
        $sanpham->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}

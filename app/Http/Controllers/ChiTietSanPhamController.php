<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Models\ChiTietSanPham;
use App\Models\Slide;
use App\Models\TheLoai;
use App\Models\HinhSanPham;
use App\Models\Comment;

use Illuminate\Support\Str;

class ChiTietSanPhamController extends Controller
{
    //
    public function getDanhSach()
    {
        $ctsanpham = ChiTietSanPham::orderBy('id','DESC')->get();
        return view ('admin.ctsanpham.danhsach',['ctsanpham'=>$ctsanpham]);
    }
    public function getThem()
    {

        $theloai = TheLoai::all();
        $sanpham = ChiTietSanPham::all();
        return view ('admin.ctsanpham.them',['theloai'=>$theloai,'sanpham'=>$sanpham]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
//            'ChiTietSanPham'=>'required',
            'TieuDe'=>'required|min:3|unique:chitiet_sp,TieuDe',
            'TomTat'=>'required',
            'NoiDung'=>'required',
        ],
        [
//            'ChiTietSanPham.required'=>'Bạn chưa chọn sản phẩm',//required là có hay k
            'TieuDe.required'=> 'Bạn chưa nhập tiêu đề',
            'Tieude.min'=> 'Tiêu đề phải có it nhất 3 ký tự',
            'TieuDe.unique'=>'Tên tiêu đề đã tồn tại', // unique kiểm tra có trùng hay k
            'TomTat.required'=>"Bạn chưa nhập tóm tắt",
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
        ]);

        $ctsanpham = new ChiTietSanPham();
        $ctsanpham->TieuDe = $request->TieuDe;
        $ctsanpham->TieuDeKhongDau = changeTitle($request->TieuDe) ;
        $ctsanpham->idSanPham = $request->SanPham;
        $ctsanpham->TomTat = $request->TomTat;
        $ctsanpham->NoiDung = $request->NoiDung;
        $ctsanpham->Gia = $request->Gia;
        $ctsanpham->KhuyenMai = $request->KhuyenMai;
        $ctsanpham->save();
        return redirect('admin/ctsanpham/them')->with('thongbao','Thêm tin tức thành công');
    }
    public function getSua($id)
    {
        $ctsanpham = ChiTietSanPham::find($id);
        return view ('admin.ctsanpham.sua',['ctsanpham'=>$ctsanpham]);
    }
    public function postSua(Request $request,$id)
    {
        $ctsanpham = ChiTietSanPham::find($id);
        $this->validate($request,
        [
            'TieuDe'=>'required|min:3',
            'TomTat'=>'required',
            'NoiDung'=>'required',
//            'Hinh'=>'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ],
        [
            'TieuDe.required'=> 'Bạn chưa nhập tiêu đề',
            'Tieude.min'=> 'Tiêu đề phải có it nhất 3 ký tự',
            'TieuDe.unique'=>'Tên tiêu đề đã tồn tại', // unique kiểm tra có trùng hay k
            'TomTat.required'=>"Bạn chưa nhập tóm tắt",
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
//            'Hinh.image'=>'không phải hình'
        ]);

        $ctsanpham->TieuDe = $request->TieuDe;
        $ctsanpham->TieuDeKhongDau = changeTitle($request->TieuDe) ;
        $ctsanpham->TomTat = $request->TomTat;
        $ctsanpham->NoiDung = $request->NoiDung;
        $ctsanpham->Gia = $request->Gia;
        $ctsanpham->KhuyenMai = $request->KhuyenMai;

        $ctsanpham->save();

        return redirect('admin/ctsanpham/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa(Request $request,$id)
    {
        $ctsanpham = ChiTietSanPham::find($id);
        $ctsanpham->delete();
        $hinh = HinhSanPham::where('idSanPham',$ctsanpham->idSanPham)->get();
        foreach($hinh as $dele){
            $path=public_path().'/admin_asset/upload/images/san-pham/'.$dele->Hinh;
            if (file_exists($path)) {
                unlink($path);
            }
            $dele->delete();
        }
        return redirect('admin/ctsanpham/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
    public function fileCreate()
    {
        return view('imageupload');
    }
    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('admin_asset/upload/images/san-pham'),$imageName);

//        $imageUpload = new HinhSanPham();
//        $imageUpload->idChiTiet_Sp = $request->idChiTiet_Sp;
//        $imageUpload->Hinh = $imageName;
//        $imageUpload->save();
        $imageUpload = HinhSanPham::updateOrCreate(
            ['Hinh' => $imageName],
            ['idSanPham' => $request->idSanPham]
        );
        return response()->json(['success'=>$imageName]);
    }
    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        HinhSanPham::where('Hinh',$filename)->delete();
        $path=public_path().'/admin_asset/upload/images/san-pham/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}

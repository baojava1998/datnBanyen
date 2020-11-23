<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\Slide;
use App\Models\TheLoai;
use App\Models\TinTuc;
use App\Models\Comment;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    //
    public function getDanhSach()
    {
        $slide = Slide::all();
        return view ('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function getThem()
    {
        return view ('admin.slide.them');
    }

    public function postThem(Request $request)
    {



        $this->validate($request,
        [
            'Ten'=>'required',
            'NoiDung'=>'required',
            'Hinh'=>'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên',//required là có hay k
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
            'Hinh.image'=>'không phải hình'
        ]);

        $slide = new Slide;
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;
        if($request->has('link'))
        {
            $slide->link = $request->link;
        }
        if($request->hasFile('Hinh'))
        {
             $file = $request->Hinh;
            //  $duoi = $file->getClientOriginalExtension();
            //  if($duoi != 'jpg' && $duoi != 'png' && $duoi !='jpeg')
            //  {
            //     return redirect('admin/tintuc/them')->with('thongbao','chỉ được chọn file có đuôi : png, jpg, jpeg');
            //  }

             $name = $file->getClientOriginalName();
             $hinh = Str::random(4)."_".$name;
             while(file_exists("admin_asset/upload/images/slide/".$hinh))
             {
                $hinh = Str::random(4)."_".$name;
             }
            $file->move("admin_asset/upload/images/slide/",$hinh);
            $slide->Hinh = $hinh;
        }
        else
        {
            $slide->Hinh = "";
        }
        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','Thêm slide thành công');
    }
    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view ('admin.slide.sua',['slide'=>$slide]);
    }
    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'Ten'=>'required',
            'NoiDung'=>'required',
            'Hinh'=>'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên',//required là có hay k
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
            'Hinh.image'=>'không phải hình'
        ]);

        $slide = Slide::find($id);
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;
        if($request->has('link'))
        {
            $slide->link = $request->link;
        }
        if($request->hasFile('Hinh'))
        {
             $file = $request->Hinh;
            //  $duoi = $file->getClientOriginalExtension();
            //  if($duoi != 'jpg' && $duoi != 'png' && $duoi !='jpeg')
            //  {
            //     return redirect('admin/tintuc/them')->with('thongbao','chỉ được chọn file có đuôi : png, jpg, jpeg');
            //  }

             $name = $file->getClientOriginalName();
             $hinh = Str::random(4)."_".$name;
             while(file_exists("admin_asset/upload/images/slide/".$hinh))
             {
                $hinh = Str::random(4)."_".$name;
             }
            unlink("admin_asset/upload/images/slide/".$slide->Hinh);
            $file->move("admin_asset/upload/images/slide/",$hinh);
            $slide->Hinh = $hinh;
        }
        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa slide thành công');
    }
    public function getXoa($id)
    {
        $slide = Slide::find($id);
        $path=public_path().'/admin_asset/upload/images/slide/'.$slide->Hinh;
        if (file_exists($path)) {
            unlink($path);
        }
        $slide->delete();
        return redirect('admin/slide/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LoaiTin;
use App\Models\Slide;
use App\Models\TheLoai;
use App\Models\TinTuc;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class UserController extends HomeController
{
    //
    public function getDanhSach()
    {
        $user = User::all();
        return view ('admin.user.danhsach',['user'=>$user]);
    }
    public function getThem()
    {
        return view ('admin.user.them');
    }

    public function postThem(Request $request)
    {

        $this->validate($request,
        [
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên người dùng',//required là có hay k
            'name.min'=>'Tên người dùng phải có it nhất 3 ký tự',
            'email.required'=>'Bạn chưa nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'bạn chưa nhập password',
            'password.min'=>'Password phải có it nhất 3 ký tự',
            'password.max'=>'Password không được quá 32 ký tự',
            'passwordAgain.same'=>'Mật khẩu không khớp',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;
        $user->save();
        return redirect('admin/user/them')->with('thongbao','Thêm user thành công');
    }
    public function getSua($id)
    {
        $user = User::find($id);
        return view ('admin.user.sua',['user'=>$user]);
    }
    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'name'=>'required|min:3',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên người dùng',//required là có hay k
            'name.min'=>'Tên người dùng phải có it nhất 3 ký tự',
        ]);

        $user = User::find($id);
        $user->name = $request->name;

        if($request->changePassword == "on")  //nếu check là on
        {
            $this->validate($request,
        [
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ],
        [
            'password.required'=>'bạn chưa nhập password',
            'password.min'=>'Password phải có it nhất 3 ký tự',
            'password.max'=>'Password không được quá 32 ký tự',
            'passwordAgain.same'=>'Mật khẩu không khớp',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu'
        ]);
            $user->password = bcrypt($request->password);
        }
        $user->quyen = $request->quyen;
        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa user thành công');
    }
    public function getXoa($id)
    {
      $user = User::find($id);
      $comment = Comment::where('idUser',$id); //Tìm các comment của user
      $comment->delete(); //Xóa các comment của user
      $user->delete(); //Xóa user
      return redirect('admin/user/danhsach')->with('thongbao','Xóa tài khoản thành công');
    }
    public function getDangnhapAdmin()
    {
        return view('admin.login');
    }
    public function postDangnhapAdmin(Request $request)
    {
        $this->validate($request,
        [

            'email'=>'required',
            'password'=>'required|min:3|max:32',
        ],
        [
            'email.required'=>'Bạn chưa nhập đúng định dạng email',
            'password.required'=>'bạn chưa nhập password',
            'password.min'=>'Password phải có it nhất 3 ký tự',
            'password.max'=>'Password không được quá 32 ký tự',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('admin/theloai/danhsach');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','đăng nhập thất bại');
        }
    }
    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
    public function getDangnhap()
    {
        return view('pages.login.login');
    }
    public function postDangnhap(Request $request)
    {
        $this->validate($request,
            [

                'email'=>'required',
                'password'=>'required|min:3|max:32',
            ],
            [
                'email.required'=>'Bạn chưa nhập đúng định dạng email',
                'password.required'=>'bạn chưa nhập password',
                'password.min'=>'Password phải có it nhất 3 ký tự',
                'password.max'=>'Password không được quá 32 ký tự',
            ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return back();
        } else {
            return back()->with('errors-login', 'Sai tài khoản hoặc mật khẩu');
        }
    }
    public function getDangXuat()
    {
        Auth::logout();
        return back();
    }
    public function postDangky(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required|min:3',
                'emailr'=>'required|email|unique:users,email',
                'passwordr'=>'required|min:3|max:32',
                'passwordAgainr'=>'required|same:passwordr'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên người dùng',//required là có hay k
                'name.min'=>'Tên người dùng phải có it nhất 3 ký tự',
                'emailr.required'=>'Bạn chưa nhập đúng định dạng email',
                'emailr.unique'=>'Email đã tồn tại',
                'passwordr.required'=>'bạn chưa nhập password',
                'passwordr.min'=>'Password phải có it nhất 3 ký tự',
                'passwordr.max'=>'Password không được quá 32 ký tự',
                'passwordAgainr.same'=>'Mật khẩu không khớp',
                'passwordAgainr.required'=>'Bạn chưa nhập lại mật khẩu'
            ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->emailr;
        $user->password = bcrypt($request->passwordr);
        $user->quyen = 0;
        $user->save();
        $this->guard()->login($user);
        return back();
    }
    protected function guard()
    {
        return Auth::guard();
    }
}

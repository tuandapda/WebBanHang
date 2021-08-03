<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\capdouser;
class UserController extends Controller
{
    //
    public function  getDanhSach()
    {
        $ojbUser=User::all();
        return view('admin.user.danhsach',['user'=>$ojbUser]);
    }
    public function  getThem()
    {
        $capdo =capdouser::all();
        return view('admin.user.them',['capdo'=>$capdo]);
    }
    public function postThem(Request $request)
    {
        $capdo =capdouser::all();
        $this->validate($request,
        [
            'Name'=>'required',
            'Email'=>'required|unique:users',
            'password'=>'required|confirmed',
            'CapDoID'=>'required',
        ],[
            'Name.required'=>'Chưa nhập tên !',
            'Email.required'=>'Chưa nhập email !',
            'password.required'=>'Chưa nhập password !',
            'password.confirmed'=>'Nhập lại password không khớp!',
            'Email.unique'=>'Email đã có người dùng',
            'CapDoID.required'=>'Chưa chọn level',
        ]);
        $ojbUser= new User($request->all());
        $ojbUser->password=bcrypt($request->input('password'));
        $ojbUser->NgayTao= Now();
        $ojbUser->save();
        return redirect('admin/user/them')->with('thongbao','Thêm thành công');
    }
    public function  getSua($id)
    {
        $capdo =capdouser::all();
        $ojbUser=User::find($id);
        return view('admin.user.sua',['capdo'=>$capdo,'user'=>$ojbUser]);
    }
    public function postSua(Request $request,$id)
    {
        $capdo =capdouser::all();
        $ojbUser=User::find($id);
        $this->validate($request,
        [
            'Name'=>'required',
            'Email'=>'required',
            'password'=>'required|confirmed',
            'CapDoID'=>'required',
        ],[
            'Name.required'=>'Chưa nhập tên !',
            'Email.required'=>'Chưa nhập email !',
            'password.required'=>'Chưa nhập password !',
            'password.confirmed'=>'Nhập lại password không khớp!',
            'CapDoID.required'=>'Chưa chọn level',
        ]);
        $ojbUser->Name=$request->input('Name');
        $ojbUser->Email=$request->input('Email');
        $ojbUser->password=bcrypt($request->input('password'));
        $ojbUser->NgayTao= Now();
        $ojbUser->Update();
        return redirect('admin/user/sua/'.$id)->with('thongbao','Thêm thành công');
    }
    public function getXoa($id)
    {   
        $ojbUser=User::find($id);
        $ojbUser->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công');
    }
    public function  getDangNhapAdmin()
    {
        return view('admin.user.login');
    }
    public function postDangNhapAdmin(Request $request)
    {
        $this->validate($request,[
            'Email'=>'required',
            'password'=>'required'
        ],[
            'Email.required'=>'Bạn Chưa Nhập email !',
            'password.required'=>'Bạn Chưa Nhập Mật Khẩu !'
        ]);
        $email =$request->input('Email');
        $password=$request->input('password');
        if( Auth::attempt(['Email'=>$email,'password'=>$password]))
        {
           
            return redirect('admin/thongke/danhsach');
        }
        else
        {
            
            return redirect('admin/dangnhap')->with('thongbao','Đăng Nhập Không Thành công');
           
        }
    }
    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}

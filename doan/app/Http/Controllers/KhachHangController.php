<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khachhang;
use App\Models\loaikhachhang;
class KhachHangController extends Controller
{
    //
    public function getDanhSach(Request $request)
    {
        $ojbLoai=loaikhachhang::all();
        $tuKhoa=$request->input('TuKhoa');
        $cboLoaiKhachHang=$request->input('cboLoaiKhachHang');
        $ojbKH=khachhang::where(function($q) use($tuKhoa)
            {$q->orWhere ('HoTen','like','%'.$tuKhoa.'%')
            ->orWhere('DienThoai','like','%'.$tuKhoa.'%')
            ->orWhere('DiaChi','like','%'.$tuKhoa.'%')
            ->orWhere('ID','like','%'.$tuKhoa.'%')
            ->orWhere('Email','like','%'.$tuKhoa.'%');
            });
        if(isset($cboLoaiKhachHang)){
            $ojbKH =$ojbKH->where('LoaiKH',$cboLoaiKhachHang);      
        }
        $ojbKH=$ojbKH->Paginate(20);
        //bo sung tieu chi tim kiem
        $ojbKH->append(['tuKhoa'=>$tuKhoa,'cboLoaiKhachHang'=>$cboLoaiKhachHang]);     
        return View('admin.khachhang.danhsach',['khachHang'=>$ojbKH,'loai'=>$ojbLoai,
        'tuKhoa'=>$tuKhoa,'cboLoaiKhachHang'=>$cboLoaiKhachHang]);
    }
    public function getThem()
    {
        $ojbLoai=loaikhachhang::all();
        return View('admin.khachhang.them',['loai'=>$ojbLoai]);
    }
    public function postThem(Request $request)
    {
        
        $this->validate($request,
        [
            
            'HoTen'=>'required|min:2|max:100',
            'DiaChi'=>'required',
            'Dienthoai'=>'required',
            'TaiKhoan'=>'required',
            'password'=>'required|confirmed',

        ],
        [
            'HoTen.required'=>'Chưa nhập tên  !',
            'HoTen.min'=>'Tên  phải có độ dài từ 2 đến 100 ký tự !',
            'HoTen.max'=>'Tên  phải có độ dài từ 2 đến 100 ký tự !',
            'DiaChi.required'=>'Chưa nhập địa chỉ !',
            'Dienthoai.required'=>'Chưa nhập số điện thoại !',
            'TaiKhoan.required'=>'Chưa nhập tài khoản !',
            'password.required'=>'Chưa nhập mật khẩu !',
            'password.confirmed'=>'Nhập lại mật khẩu chưa khớp!'
            
        ]);  
        $ojbKH =new khachhang($request->all());
        $ojbKH->password=md5($request->input('MatKhau'));
        $ojbKH->save();
        return redirect('admin/khachhang/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $ojbLoai=loaikhachhang::all();
        $ojbKH= khachhang::find($id);
        return View('admin.khachhang.sua',['kh'=>$ojbKH],['loai'=>$ojbLoai]);
    }
    public function postSua(Request $request,$id)
    {
        $ojbKH=khachhang::find($id);
        $this->validate($request,
        [
            'ID'=>'required|min:2|max:100|',
            'HoTen'=>'required|min:2|max:100',
            'DiaChi'=>'required',
            'Dienthoai'=>'required',
            'TaiKhoan'=>'required',
            'password'=>'required|confirmed', 
        ],
        [
            'ID.required'=>'Chưa nhập ID  !',
            'Id.min'=>'ID  có độ dài từ 2 đến 100 ký tự !',
            'Id.max'=>'ID  có độ dài từ 2 đến 100 ký tự !',
            'HoTen.required'=>'Chưa nhập tên  !',
            'HoTen.min'=>'Tên  phải có độ dài từ 2 đến 100 ký tự !',
            'HoTen.max'=>'Tên  phải có độ dài từ 2 đến 100 ký tự !',
            'DiaChi.required'=>'Chưa nhập địa chỉ !',
            'Dienthoai.required'=>'Chưa nhập số điện thoại !',
            'TaiKhoan.required'=>'Chưa nhập tài khoản !',
            'password.required'=>'Chưa nhập mật khẩu !',
            'password.confirmed'=>' Nhập  lại mật khẩu không khớp !',
        ]);
       $ojbKH->HoTen=$request->input('HoTen');
       $ojbKH->Dienthoai=$request->input('Dienthoai');
       $ojbKH->Email=$request->input('Email');
       $ojbKH->DiaChi=$request->input('DiaChi');
       $ojbKH->GioiTinh=$request->input('GioiTinh');
       $ojbKH->NgaySinh=$request->input('NgaySinh');
       $ojbKH->TaiKhoan=$request->input('TaiKhoan');
       $ojbKH->password=md5($request->input('MatKhau'));
       $ojbKH->LoaiKH=$request->input('LoaiKH');
        $ojbKH->save();
        return redirect('admin/khachhang/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {   
        $ojbKH=khachhang::find($id);
        $ojbKH->delete();
        return redirect('admin/khachhang/danhsach')->with('thongbao','Xóa thành công');
    }
}

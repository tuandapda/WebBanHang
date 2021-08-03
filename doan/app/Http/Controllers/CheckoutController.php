<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khachhang;
use App\Models\loaikhachhang;
use App\Models\hoadonbanct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Session;
session_start();
class CheckoutController extends Controller
{
    //
    public function getLoginCheckOut()//hien thị trang đăng nhập-đăng ký
    {
        return view('web.logincheckout.checkout');
    }
    public function postLoginCheckOut(Request $request)//insert khách hàng -đăng ký
    {
        $this->validate($request,
        [
            'HoTen'=>'required|min:2|max:100',
            'DiaChi'=>'required',
            'Dienthoai'=>'required',
            'Email'=>'required',
            'TaiKhoan'=>'required|unique:khachhang',
            'password'=>'required|confirmed',

        ],
        [
            'HoTen.required'=>'Chưa nhập tên  !',
            'HoTen.min'=>'Tên  phải có độ dài từ 2 đến 100 ký tự !',
            'HoTen.max'=>'Tên  phải có độ dài từ 2 đến 100 ký tự !',
            'DiaChi.required'=>'Chưa nhập địa chỉ !',
            'Dienthoai.required'=>'Chưa nhập số điện thoại !',
            'Email.required'=>'Chưa nhập email',
            'TaiKhoan.required'=>'Chưa nhập tài khoản !',
            'TaiKhoan.unique'=>'Tài khoản đã có người dùng',
            'password.required'=>'Chưa nhập mật khẩu !',
            'password.confirmed'=>' Nhập  lại mật khẩu không khớp !',
        ]);  
        $data= array();
        $data['HoTen']=$request->HoTen;
        $data['Dienthoai']=$request->Dienthoai;
        $data['Email']=$request->Email;
        $data['DiaChi']=$request->DiaChi;
        $data['TaiKhoan']=$request->TaiKhoan;
        $data['LoaiKH']='L003';
        $data['password']=md5($request->input('password'));
        $ID_khachHang=DB::table('khachhang')->insertGetId($data);
        Session::put('id_khachhang',$ID_khachHang);
        Session::put('taikhoan_khachhang',$request->TaiKhoan);
        return Redirect::to('web/logincheckout/show_checkout');
    }
    public function getShowCheckOut()//hien thị trang thanh toán
    {
        $id_khachhang=Session::get('id_khachhang');
        if(isset($id_khachhang))
        {
            $ojbKhachhang=khachhang::find($id_khachhang);
        }
        $tong=Cart::getTotal();
        $sp=Cart::getContent();
        return view('web.logincheckout.show_checkout')
        ->with('sp',$sp)
        ->with('tong',$tong)
        ->with('ojbKH',$ojbKhachhang);
    }
    public function getLogOutCheckOut()//đăng xuất
    {
        Session::flush();
        return Redirect::to('web/logincheckout/checkout');
    }
    public function postLogin(Request $request)//đăng nhập
    {
        $taiKhoan =$request->TaiKhoan;
        $password= md5($request->password);
        $result =DB::table('khachhang')->where('TaiKhoan',$taiKhoan)->where('password',$password)->first();
        if($result){
            Session::put('id_khachhang',$result->ID);
            Session::put('taikhoan_khachhang',$request->TaiKhoan);
            return Redirect::to('web/logincheckout/show_checkout');
        }else{
           
            return Redirect::to('web/logincheckout/checkout');
        }
    }
    public function postDatHang(Request $request)
    {   //update lai thong tin khach hang
        $id_khachhang=Session::get('id_khachhang');
        $ojbKhachhang=khachhang::find($id_khachhang);
        $ojbKhachhang->HoTen=$request->HoTen;
        $ojbKhachhang->dienThoai=$request->Dienthoai;
        $ojbKhachhang->email=$request->Email;
        $ojbKhachhang->diaChi =$request->DiaChi;
        $ojbKhachhang->update();
        //insert_hoadonban
        $hoadonban = array();
        $hoadonban['NgayBan']=Now();
        $hoadonban['KhachHang_Id']=$id_khachhang;
        $hoadonban['MoTa']=$request->GhiChu;
        $hoadonban['TenHoaDon']=$request->GhiChu;
        $hoadonban['TrangThai']='DXL';
        $hoadonban['HinhThucThanhToan']=$request->HTTT;
        $id_hoadonban=DB::table('hoadonban')->insertGetId($hoadonban);
        //insert_hoadonbanct
        $sp=Cart::getContent(); 
        foreach ($sp as $item) {
            $hoadonbanct = new hoadonbanct();   
            $hoadonbanct->HoaDonID =$id_hoadonban;
            $hoadonbanct->HangHoaID= $item->id;
            $hoadonbanct->SoLuong=$item->quantity;
            $hoadonbanct->GiaBan=$item->price;
            $hoadonbanct->save();
        }
        return redirect('web/logincheckout/show_checkout')->with('thongbao','Đặt hàng thành công');
    }
}

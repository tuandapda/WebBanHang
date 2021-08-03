<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hoadonmua;
use App\Models\hoadonmuact;
use Illuminate\Support\Facades\DB;

class HoaDonMuaController extends Controller
{
    //
    public function getDanhSach()
    {
        $hdm= HoaDonMua ::all();
        return View('admin.hoadonmua.danhsach',['hdm'=>$hdm]);
    }
    public function getChiTiet($MaHoaDon)
    {
        
        $hdm=HoadonMua::find($MaHoaDon);
        $ojbChiTiet= DB::select(
        'SELECT MaHang,TenHang,NhaCC_Id,SoLuong,GiaMua FROM `hoadonmuact`INNER JOIN sanpham
        ON hoadonmuact.HangHoaID=sanpham.MaHang 
        WHERE hoadonmuact.HoaDonID=:ma',['ma'=>$MaHoaDon]);
        $ojbChiTiet1= DB::select('SELECT ID,HoTen,DienThoai,Email,DiaChi FROM hoadonmua INNER JOIN khachhang
        ON hoadonmua.KhachHang_Id=khachhang.ID 
        WHERE hoadonmua.MaHoaDon=:makh',['makh'=>$MaHoaDon]);
         foreach ($ojbChiTiet1 as $kh)
         {
             $ojbChiTietKH=$kh;
         }
        return View('admin.hoadonmua.chitiet')
        ->with('hdm',$hdm)
        ->with('chiTiet',$ojbChiTiet)
        ->with('chiTietKH',$ojbChiTietKH);
    }
}

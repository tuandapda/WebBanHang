<?php

namespace App\Http\Controllers;
use App\Models\hoadonban;
use App\Models\hoadonbanct;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HoaDonBanController extends Controller
{
    //
    public function getDanhSach()
    {
        $hdb= HoaDonBan ::all();
        return View('admin.hoadonban.danhsach',['hdb'=>$hdb]);
    }
    public function getChiTiet($MaHoaDon)
    {
        
        $hdb=HoaDonBan::find($MaHoaDon);
        $ojbChiTiet= DB::select(
        'SELECT MaHang,TenHang,NhaCC_Id,SoLuong,GiaBan,GiamGia FROM `hoadonbanct`INNER JOIN sanpham
        ON hoadonbanct.HangHoaID=sanpham.MaHang 
        WHERE hoadonbanct.HoaDonID=:ma',['ma'=>$MaHoaDon]);
        $ojbChiTiet1= DB::select('SELECT ID,HoTen,DienThoai,Email,DiaChi FROM hoadonban INNER JOIN khachhang
        ON hoadonban.KhachHang_Id=khachhang.ID 
        WHERE hoadonban.MaHoaDon=:makh',['makh'=>$MaHoaDon]);
         foreach ($ojbChiTiet1 as $kh)
         {
             $ojbChiTietKH=$kh;
         }
        return View('admin.hoadonban.chitiet')
        ->with('hdb',$hdb)
        ->with('chiTiet',$ojbChiTiet)
        ->with('chiTietKH',$ojbChiTietKH);
    }
    public function getXoa($id)
    {
        $ojbChiTiet=hoadonbanct::where('HoaDonID',$id)->delete();
        $hdb=hoadonban::find($id);
        $hdb->delete();
        return redirect('admin/hoadonban/danhsach')->with('thongbao','Xóa thành công');
    }
}

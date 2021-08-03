<?php

namespace App\Http\Controllers;
use App\Models\danhgia;
use App\Models\SanPham;
use App\Models\khachhang;

use Illuminate\Support\Facades\DB;
use Session;
session_start();

use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    //
    public function xoa($id,$idSanPham)
    {
        $danhGia=danhgia::find($id);
        $danhGia->delete();
        return redirect('admin/sanpham/sua/'.$idSanPham)->with('thongbao1','Xóa bình luận thành công');
    }
    
    public function postBinhLuan(Request $request,$id)
    {
        $sanPham = SanPham::find($id);
        $id_khachhang=Session::get('id_khachhang'); 
        $danhgia = new danhgia();
        $danhgia->ID_SanPham=$id;
        $danhgia->ID_KhachHang=$id_khachhang;
        $danhgia->NoiDung=$request->NoiDung;
        $danhgia->Diem=$request->Diem;
        $danhgia->NgayCapNhat=Now();
        $danhgia->save();
        return redirect('web/chitietsanpham/'.$sanPham->MaHang)->with('thongbao','Viết bình luận thành công.');
    }
}

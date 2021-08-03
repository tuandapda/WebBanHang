<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khachhang;
use App\Models\danhmuc;
use App\Models\hoadonban;
use App\Models\sanpham;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    //
    public function getDanhSach()
    {
        $soLuongKH= khachhang::count();
        $soluongDM= danhmuc::count();
        $soLuongHDB= hoadonban::count();
        $soLuongSP = sanpham::count();
        $ojbThongKe = DB::table('thongketonkho')->Paginate(10);
        return view('admin.thongke.danhsach',['soLuongKH'=>$soLuongKH,
        'soLuongDM'=>$soluongDM,'soLuongHDB'=>$soLuongHDB,'soLuongSP'=>$soLuongSP,'ojbThongKe'=>$ojbThongKe]);
    }
}

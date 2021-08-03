<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\danhmuc;
use App\Models\nhacc;
use App\Models\danhgia;
class SanPhamController extends Controller
{
    //
    public function getDanhSach( Request $request)
    {
        
        $danhMucS =DanhMuc::all();
        $nhaCC=NhaCC::all();
        $tuKhoa=$request->input('TuKhoa');
        $danhMuc=$request->input('cboDanhMuc');
        $nhaCungCap=$request->input('cboNhaCungCap');
        //xuly tin kiem
        
            $sanPhamS=SanPham::where(function($q) use($tuKhoa)
            {$q->orWhere ('TenHang','like','%'.$tuKhoa.'%')
            ->orWhere('MoTa','like','%'.$tuKhoa.'%')
            ->orWhere('MaHang','like','%'.$tuKhoa.'%');
            });
            
        
        if(isset($danhMuc)){
            $sanPhamS =$sanPhamS->where('DanhMuc_Id',$danhMuc);      
        }         
        if(isset($nhaCungCap))
        {
            $sanPhamS =$sanPhamS->where('NhaCC_Id',$nhaCungCap); 
        }   
        $sanPhamS=$sanPhamS->Paginate(10); 
        //bo sung tieu chi tim kiem
        $sanPhamS->append(['tuKhoa'=>$tuKhoa,'danhMucId'=>$danhMuc,'nhaCungCapId'=>$nhaCungCap]);
        return View('admin.sanpham.danhsach')
        ->with('sanpham',$sanPhamS)
        ->with('danhmuc',$danhMucS)
        ->with('nhacc',$nhaCC)
        ->with('tuKhoa',$tuKhoa)
        ->with('danhMucId',$danhMuc)
        ->with('nhaCungCap',$nhaCungCap);
    }
    public function getThem()
    {
        $nhaCC=NhaCC::all();
        $danhMuc =DanhMuc::all();
        return View('admin.sanpham.them')
        ->with('danhmuc',$danhMuc)
        ->with('nhacc',$nhaCC);
    }
    public function postThem(Request $request)
    {
        
        $this->validate($request,
        [
            'MaHang'=>'required|min:5|max:100|',
            'TenHang'=>'required|min:2|max:100',
            'NhaCC_Id'=>'required',
            'DanhMuc_Id'=>'required',
            'GiaSP'=>'required|numeric',
            'GiamGia'=>'required|digits_between:0,100',
            'NgayTao'=>'required',
        ],
        [
            'MaHang.required'=>'Chưa nhập mã hàng !',
            'MaHang.min'=>'Mã hàng nhà cung cấp phải có độ dài từ 5 đến 100 ký tự !',
            'MaHang.max'=>'Mã hàng cung cấp phải có độ dài từ 5 đến 100 ký tự !',
            'TenHang.required'=>'Chưa nhập tên hàng !',
            'TenHang.min'=>'Tên hàng nhà cung cấp phải có độ dài từ 5 đến 100 ký tự !',
            'TenHang.max'=>'Tên hàng cung cấp phải có độ dài từ 5 đến 100 ký tự !',
            'NhaCC_Id.required'=>'Chưa chọn  nhà cung cấp !',
            'DanhMuc_Id.required'=>'Chưa chọn  danh mục !',
            'GiaSP.required'=>'Chưa nhập giá sản phẩm !',
            'GiaSP.numeric'=>' Giá phải là một số! ',
            'GiamGia.required'=>'Chưa nhập giảm giá !',
            'GiamGia.digits_between'=>'Giảm giá phải là một số trong khoảng 0 đến 100!',
            'NgayTao.required'=>'Chưa nhập ngày tạo !',
        ]);
        $sanPham =new sanpham;
        $sanPham->MaHang=$request->MaHang;
        $sanPham->TenHang=$request->TenHang;
        $image = $request->Anh;
        if($request->hasFile('Anh'))
        {
            //Lấy tên file ảnh
            $fileName = $image->getClientOriginalName();
            //Lưu vào thư mục upload của thư mục 
            $image->move('upload/sanpham', $fileName);
            $sanPham->Anh= $fileName;
        }
        else
        {
            $sanPham->Anh="";
        }
        $sanPham->NhaCC_Id=$request->NhaCC_Id;
        $sanPham->DanhMuc_Id=$request->DanhMuc_Id;
        $sanPham->GiaSP=$request->GiaSP;
        $sanPham->GiamGia=$request->GiamGia;
        $sanPham->NgayTao=$request->NgayTao;
        $sanPham->MoTa=$request->MoTa;
        $sanPham->save();
        return redirect('admin/sanpham/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($MaHang)
    {
        $nhaCC=NhaCC::all();
        $danhMuc =DanhMuc::all();
        $sanPham= SanPham::find($MaHang);
        return View('admin.sanpham.sua')
        ->with('sanpham',$sanPham)
        ->with('danhmuc',$danhMuc)
        ->with('nhacc',$nhaCC);
    }
    public function postSua(Request $request,$MaHang)
    {
        $sanPham=SanPham::find($MaHang);
        $this->validate($request,
        [
            
            'TenHang'=>'required|min:2|max:100',
            'NhaCC_Id'=>'required',
            'DanhMuc_Id'=>'required',
            'GiaSP'=>'required|numeric',
            'GiamGia'=>'required|digits_between:0,100',
            'NgayTao'=>'required',  
        ],
        [
            'TenHang.required'=>'Chưa nhập tên hàng !',
            'TenHang.min'=>'Tên hàng nhà cung cấp phải có độ dài từ 5 đến 100 ký tự !',
            'TenHang.max'=>'Tên hàng cung cấp phải có độ dài từ 5 đến 100 ký tự !',
            'NhaCC_Id.required'=>'Chưa chọn  nhà cung cấp !',
            'DanhMuc_Id.required'=>'Chưa chọn  danh mục !',
            'GiaSP.required'=>'Chưa nhập giá sản phẩm !',
            'GiaSP.numeric'=>'Giá phải là một số! ',
            'GiamGia.digits_between'=>'Giảm giá phải là một số trong khoảng 0 đến 100!',
            'NgayTao.required'=>'Chưa nhập ngày tạo !',
        ]);
        $sanPham->TenHang=$request->TenHang;
        $sanPham->MoTa=$request->MoTa;
        $image = $request->Anh;
        if($request->hasFile('Anh'))
        {
            //Lấy tên file ảnh
            $fileName = $image->getClientOriginalName();
            //Lưu vào thư mục upload của thư mục 
            $image->move('upload/sanpham', $fileName);
            $sanPham->Anh= $fileName;
        }
        $sanPham->NhaCC_Id=$request->NhaCC_Id;
        $sanPham->DanhMuc_Id=$request->DanhMuc_Id;
        $sanPham->GiaSP=$request->GiaSP;
        $sanPham->GiamGia=$request->GiamGia;
        $sanPham->NgayTao=$request->NgayTao;
        $sanPham->save();
        return redirect('admin/sanpham/sua/'.$MaHang)->with('thongbao','Sửa thành công');
    }
    public function getXoa($MaHang)
    {   
        $sanPham=SanPham::find($MaHang);
        $sanPham->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa thành công');
    }

}

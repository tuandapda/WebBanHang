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
            'MaHang.required'=>'Ch??a nh???p m?? h??ng !',
            'MaHang.min'=>'M?? h??ng nh?? cung c???p ph???i c?? ????? d??i t??? 5 ?????n 100 k?? t??? !',
            'MaHang.max'=>'M?? h??ng cung c???p ph???i c?? ????? d??i t??? 5 ?????n 100 k?? t??? !',
            'TenHang.required'=>'Ch??a nh???p t??n h??ng !',
            'TenHang.min'=>'T??n h??ng nh?? cung c???p ph???i c?? ????? d??i t??? 5 ?????n 100 k?? t??? !',
            'TenHang.max'=>'T??n h??ng cung c???p ph???i c?? ????? d??i t??? 5 ?????n 100 k?? t??? !',
            'NhaCC_Id.required'=>'Ch??a ch???n  nh?? cung c???p !',
            'DanhMuc_Id.required'=>'Ch??a ch???n  danh m???c !',
            'GiaSP.required'=>'Ch??a nh???p gi?? s???n ph???m !',
            'GiaSP.numeric'=>' Gi?? ph???i l?? m???t s???! ',
            'GiamGia.required'=>'Ch??a nh???p gi???m gi?? !',
            'GiamGia.digits_between'=>'Gi???m gi?? ph???i l?? m???t s??? trong kho???ng 0 ?????n 100!',
            'NgayTao.required'=>'Ch??a nh???p ng??y t???o !',
        ]);
        $sanPham =new sanpham;
        $sanPham->MaHang=$request->MaHang;
        $sanPham->TenHang=$request->TenHang;
        $image = $request->Anh;
        if($request->hasFile('Anh'))
        {
            //L???y t??n file ???nh
            $fileName = $image->getClientOriginalName();
            //L??u v??o th?? m???c upload c???a th?? m???c 
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
        return redirect('admin/sanpham/them')->with('thongbao','Th??m th??nh c??ng');
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
            'TenHang.required'=>'Ch??a nh???p t??n h??ng !',
            'TenHang.min'=>'T??n h??ng nh?? cung c???p ph???i c?? ????? d??i t??? 5 ?????n 100 k?? t??? !',
            'TenHang.max'=>'T??n h??ng cung c???p ph???i c?? ????? d??i t??? 5 ?????n 100 k?? t??? !',
            'NhaCC_Id.required'=>'Ch??a ch???n  nh?? cung c???p !',
            'DanhMuc_Id.required'=>'Ch??a ch???n  danh m???c !',
            'GiaSP.required'=>'Ch??a nh???p gi?? s???n ph???m !',
            'GiaSP.numeric'=>'Gi?? ph???i l?? m???t s???! ',
            'GiamGia.digits_between'=>'Gi???m gi?? ph???i l?? m???t s??? trong kho???ng 0 ?????n 100!',
            'NgayTao.required'=>'Ch??a nh???p ng??y t???o !',
        ]);
        $sanPham->TenHang=$request->TenHang;
        $sanPham->MoTa=$request->MoTa;
        $image = $request->Anh;
        if($request->hasFile('Anh'))
        {
            //L???y t??n file ???nh
            $fileName = $image->getClientOriginalName();
            //L??u v??o th?? m???c upload c???a th?? m???c 
            $image->move('upload/sanpham', $fileName);
            $sanPham->Anh= $fileName;
        }
        $sanPham->NhaCC_Id=$request->NhaCC_Id;
        $sanPham->DanhMuc_Id=$request->DanhMuc_Id;
        $sanPham->GiaSP=$request->GiaSP;
        $sanPham->GiamGia=$request->GiamGia;
        $sanPham->NgayTao=$request->NgayTao;
        $sanPham->save();
        return redirect('admin/sanpham/sua/'.$MaHang)->with('thongbao','S???a th??nh c??ng');
    }
    public function getXoa($MaHang)
    {   
        $sanPham=SanPham::find($MaHang);
        $sanPham->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao','X??a th??nh c??ng');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nhacc;
class NhaCungCapController extends Controller
{
    //
    public function getDanhSach()
    {
        $nhaCC=NhaCC::all();
        return View('admin.nhacc.danhsach',['nhacc'=>$nhaCC]);
    }
    public function getThem()
    {
        return View('admin.nhacc.them');
    }
    public function postThem(Request $request)
    {
        
        $this->validate($request,
        [
            'Id'=>'required|min:2|max:100|',
            'TenNhaCC'=>'required|min:2|max:100',
            'QuocGia'=>'required',
            'NgayTao'=>'required',
        ],
        [
            'Id.required'=>'Chưa nhập ID danh mục !',
            'Id.min'=>'ID nhà cung cấp phải có độ dài từ 2 đến 100 ký tự !',
            'Id.max'=>'ID nhà cung cấp phải có độ dài từ 2 đến 100 ký tự !',
            'TenNhaCC.required'=>'Chưa nhập tên nhà cung cấp !',
            'TenNhaCC.min'=>'Tên nhà cung cấp phải có độ dài từ 2 đến 100 ký tự !',
            'TenNhaCC.max'=>'Tên nhà cung cấp phải có độ dài từ 2 đến 100 ký tự !',
            'QuocGia.required'=>'Chưa nhập tên quốc gia !',
            'NgayTao.required'=>'Chưa nhập ngày tạo !',
        ]);
        $nhacc =new nhacc;
        $nhacc->NhaCC_Id=$request->Id;
        $nhacc->TenNhaCC=$request->TenNhaCC;
        $nhacc->QuocGia=$request->QuocGia;
        $nhacc->NgayTao=$request->NgayTao;
        $nhacc->save();
        return redirect('admin/nhacc/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
       
        $nhacc= NhaCC::find($id);
        return View('admin.nhacc.sua',['nhacc'=>$nhacc]);
    }
    public function postSua(Request $request,$id)
    {
        $nhacc=NhaCC::find($id);
        $this->validate($request,
        [
            
            'TenNhaCC'=>'required|min:2|max:100',
            'QuocGia'=>'required',
            'NgayTao'=>'required',   
        ],
        [
            'TenNhaCC.required'=>'Chưa nhập tên nhà cung cấp !',
            'TenNhaCC.min'=>'Tên nhà cung cấp phải có độ dài từ 2 đến 100 ký tự !',
            'TenNhaCC.max'=>'Tên nhà cung cấp phải có độ dài từ 2 đến 100 ký tự !',
            'QuocGia.required'=>'Chưa nhập tên quốc gia !',
            'NgayTao.required'=>'Chưa nhập ngày tạo !',
        ]);
        $nhacc->TenNhaCC=$request->TenNhaCC;
        $nhacc->QuocGia=$request->QuocGia;
        $nhacc->NgayTao=$request->NgayTao;
        $nhacc->save();
        return redirect('admin/nhacc/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {   
        $nhacc=NhaCC::find($id);
        $nhacc->delete();
        return redirect('admin/nhacc/danhsach')->with('thongbao','Xóa thành công');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;
class DanhMucController extends Controller
{
    //hàm danh sách
    public function getDanhSach()
    {
        $danhMuc =DanhMuc::all();
        return View('admin.danhmuc.danhsach',['danhmuc'=>$danhMuc]);
    }
    public function getThem()
    {
        return View('admin.danhmuc.them');
    }
    public function postThem(Request $request)
    {
        
        $this->validate($request,
        [
            'Id'=>'required|min:2|max:100|',
            'TenDM'=>'required|min:2|max:100',
            'NgayTao'=>'required',
        ],
        [
            'Id.required'=>'Chưa nhập ID danh mục !',
            'Id.min'=>'ID danh mục phải có độ dài từ 2 đến 100 ký tự !',
            'Id.max'=>'ID danh mục phải có độ dài từ 2 đến 100 ký tự !',
            
            'TenDM.required'=>'Chưa nhập tên danh mục !',
            'TenDM.min'=>'Tên danh mục phải có độ dài từ 2 đến 100 ký tự !',
            'TenDM.max'=>'Tên danh mục phải có độ dài từ 2 đến 100 ký tự !',
            'NgayTao.required'=>'Chưa nhập ngày tạo !',
        ]);
        $danhMuc =new danhmuc;
        $danhMuc->DanhMuc_Id=$request->Id;
        $danhMuc->TenDM=$request->TenDM;
        $danhMuc->NgayTao=$request->NgayTao;
        $danhMuc->save();
        return redirect('admin/danhmuc/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
       
        $danhMuc= DanhMuc::find($id);
        return View('admin.danhmuc.sua',['danhmuc'=>$danhMuc]);
    }
    public function postSua(Request $request,$id)
    {
        $danhMuc=DanhMuc::find($id);
        $this->validate($request,
        [
            'TenDM'=>'required|min:2|max:100|unique:DanhMuc',
            'NgayTao'=>'required',     
        ],
        [
            'TenDM.required'=>'Chưa nhập tên danh mục !',
            'TenDM.min'=>'Tên danh mục phải có độ dài từ 2 đến 100 ký tự !',
            'TenDM.max'=>'Tên danh mục phải có độ dài từ 2 đến 100 ký tự !',
            'TenDM.unique'=>'Tên danh mục đã tồn tại!',
            'NgayTao.required'=>'Chưa nhập ngày tạo !',
        ]);
        $danhMuc->TenDM=$request->TenDM;
        $danhMuc->NgayTao=$request->NgayTao;
        $danhMuc->save();
        return redirect('admin/danhmuc/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {   
        $danhMuc=DanhMuc::find($id);
        $danhMuc->delete();
        return redirect('admin/danhmuc/danhsach')->with('thongbao','Xóa thành công');
    }

}

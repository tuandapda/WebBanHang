<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loaitin;
use App\Models\tin;
use Illuminate\Support\Facades\Storage;

class TinController extends Controller
{
    //
    public function getDanhSach()
    {
        $ojbTin=tin::all();
        return View('admin.tin.danhsach',['tin'=>$ojbTin]);
    }
    public function getThem()
    {
        $ojbLoaiTin=loaitin::all();
        return View('admin.tin.them',['loaitin'=>$ojbLoaiTin]);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'TieuDe'=>'required',
            'NgayCapNhat'=>'required',
            'LoaiTin_ID'=>'required',
        ],
        [
            'TieuDe.required'=>'Chưa nhập tên',
            'NgayCapNhat.required'=>'Chưa nhập ngày',
            'LoaiTin_ID.required'=>'Chưa nhập loại tin',
        ]);
        $ojbTin = new tin($request->all());
        $image = $request->Anh;
        if($request->hasFile('Anh'))
        {
            //Lấy tên file ảnh
            $fileName = $image->getClientOriginalName();
            //Lưu vào thư mục upload của thư mục storage
            //Cấu hình trong filesystems.php
            $image->move('upload/tintuc', $fileName);
            $ojbTin->Anh= $fileName;
        }
        $ojbTin ->save();
        return redirect('admin/tin/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $ojbLoaiTin=loaitin::all();
        $ojbTin=tin::find($id);
        return View('admin.tin.sua',['loaitin'=>$ojbLoaiTin,'tin'=>$ojbTin]);
    }
    public function postSua(Request $request,$id)
    {
        $ojbTin=tin::find($id);
        $this->validate($request,
        [
            'TieuDe'=>'required',
            'NgayCapNhat'=>'required',
            'NoiDung'=>'required',
            'LoaiTin_ID'=>'required',
        ],
        [
            'TieuDe.required'=>'Chưa nhập tên',
            'NgayCapNhat.required'=>'Chưa nhập ngày',
            'NoiDung.required'=>'Chưa nhập nội dung',
            'LoaiTin_ID.required'=>'Chưa nhập nội dung',
        ]);
        $ojbTin->TieuDe = $request->input('TieuDe');
        $ojbTin->NgayCapNhat = $request->input('NgayCapNhat');
        $ojbTin->NoiDung = $request->input('NoiDung');
        $ojbTin->LoaiTin_ID = $request->input('LoaiTin_ID');
        $image = $request->Anh;
        if($request->hasFile('Anh'))
        {
            //Lấy tên file ảnh
            $fileName = $image->getClientOriginalName();
            //Lưu vào thư mục upload của thư mục 
            $image->move('upload/tintuc', $fileName);
            $ojbTin->Anh= $fileName;
        }
        $ojbTin ->update();
        return redirect('admin/tin/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {   
        $ojbTin=tin::find($id);
        $ojbTin->delete();
        return redirect('admin/tin/danhsach')->with('thongbao','Xóa thành công');
    }
}

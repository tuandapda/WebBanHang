<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loaitin;
class loaiTinController extends Controller
{
    //
    public function getDanhSach()
    {
        $ojbLoai=loaitin::all();
        return View('admin.loaitin.danhsach',['loaitin'=>$ojbLoai]);
    }
    public function getThem()
    {
        return View('admin.loaitin.them');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'Ten'=>'required',
            'NgayCapNhat'=>'required',
        ],
        [
            'Ten.required'=>'Chưa nhập tên',
            'NgayCapNhat.required'=>'Chưa nhập ngày',
        ]);
        $loaitin = new loaitin($request->all());
        $loaitin ->save();
        return redirect('admin/loaitin/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $ojbLoaiTin=loaitin::find($id);
        return View('admin.loaitin.sua',['loaitin'=>$ojbLoaiTin]);
    }
    public function postSua(Request $request,$id)
    {
        $ojbLoaiTin=loaitin::find($id);
        $this->validate($request,
        [
            'Ten'=>'required',
            'NgayCapNhat'=>'required',
        ],
        [
            'Ten.required'=>'Chưa nhập tên',
            'NgayCapNhat.required'=>'Chưa nhập ngày',
        ]);
        $ojbLoaiTin->Ten=$request->input('Ten');
        $ojbLoaiTin->NgayCapNhat=$request->input('NgayCapNhat');
        $ojbLoaiTin ->update();
        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {   
        $ojbLoaiTin=loaitin::find($id);
        $ojbLoaiTin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Xóa thành công');
    }
}

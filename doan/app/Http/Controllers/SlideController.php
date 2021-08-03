<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slide;
use Illuminate\Support\Facades\DB;


class SlideController extends Controller
{
    //
    public function getDanhSach()
    {
        $ojbSlide= slide::all();
        return view('admin.slide.danhsach',['slide'=>$ojbSlide]);
    }
    public function getThem()
    {
        return view('admin.slide.them');
    }
    public function postThem(Request $request) 
    {
        $ojbSlide = new slide();
        $ojbSlide->MoTa =$request->input('MoTa');
        $image = $request->Anh;
        if($request->hasFile('Anh'))
        {
            //Lấy tên file ảnh
            $fileName = $image->getClientOriginalName();
            //Lưu vào thư mục upload của thư mục storage
            //Cấu hình trong filesystems.php
            $image->move('upload/slide', $fileName);
            $ojbSlide->Anh= $fileName;
        }
        $ojbSlide->NgayCapNhat = Now();
        $ojbSlide->save();
        return redirect('admin/slide/them')->with('thongbao','Thêm thành công !');
    }
    public function getSua($id)
    {
        $ojbSlide = slide::find($id);
        return view('admin.slide.sua',['slide'=>$ojbSlide]);
    }
    public function postSua(Request $request,$id) 
    {
        $ojbSlide = slide::find($id);
        $ojbSlide->MoTa =$request->input('MoTa');
        $image = $request->Anh;
        if($request->hasFile('Anh'))
        {
            
            $fileName = $image->getClientOriginalName();
           
            $image->move('upload/slide', $fileName);
            $ojbSlide->Anh= $fileName;
        }
        $ojbSlide->NgayCapNhat = Now();
        $ojbSlide->update();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công !');
    }
    public function getXoa($id)
    {   
        $ojbSlide = slide::find($id);
        $ojbSlide->delete();
        return redirect('admin/slide/danhsach')->with('thongbao','Xóa thành công');
    }
}

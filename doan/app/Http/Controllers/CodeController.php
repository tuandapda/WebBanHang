<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\code;
class CodeController extends Controller
{
    //
    public function getDanhSach()
    {
        $code =code::all();
        return view('admin.giamgia.danhsach',['code'=>$code]);
    }
    public function getThem()
    {
        return view('admin.giamgia.them');
    }
    public function postThem(Request $request)
    {
       $code = new code($request->all());
       $code->save();
       return redirect('admin/giamgia/them')->with('thongbao','Thêm thành công !');
    }
    public function getXoa($id)
    {   
        $code= code::find($id);
        $code->delete();
        return redirect('admin/giamgia/danhsach')->with('thongbao','Xóa thành công');
    }
}

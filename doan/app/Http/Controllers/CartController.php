<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\SanPham;
use App\Models\DanhMuc;
use App\Models\NhaCC;
use App\Models\Code;
use Session;
session_start();
class CartController extends Controller
{
    //
    public function check_code(Request $request)
    {
        $data=$request->all();
        // echo $data['Ma'];
        $code = Code::where('Ma',$data['Ma'])->first();
        if($code){
            $count_code =$code->count();
            if($count_code>0){
                $code_session = Session::get('code');
                if($code_session==true){
                    $is_avaiable=0;
                    if($is_avaiable==0){
                        $cou[]=array(
                            'Ma'=>$code->Ma,
                            'HinhThuc'=> $code->HinhThuc,
                            'GiaTri'=>$code->GiaTri,
                        );
                        Session::put('code',$cou);
                    }
                }else {
                    $cou[]=array(
                        'Ma'=>$code->Ma,
                        'HinhThuc'=>$code->HinhThuc,
                        'GiaTri'=>$code->GiaTri,
                    );
                    Session::put('code',$cou);
                }
                Session::save();
                return redirect()->back()->with('thongbao','Thêm mã giảm giá thành công !');
            }
        }else {
            return redirect()->back()->with('thongbao','Mã giảm giá không đúng !');
        }
    }

    
    public function getAddCart(Request $request, $id)
    {
        $danhMuc =DanhMuc::all();
        $nhaCC = NhaCC::all();
        $sp =SanPham::find($id);
        Cart::add(array(
            'id' => $id, // inique row ID
            'name' => $sp->TenHang,
            'price' =>($sp->GiaSP)-(($sp->GiaSP)*($sp->GiamGia)/100),
            'quantity'=>1,
            'attributes' => array('anh'=>$sp->Anh),
        ));
        return  redirect('web/showcart')
        ->with('nhacc',$nhaCC)
        ->with('danhmuc',$danhMuc);
    }
    public function getShowCart()
    {
        $danhMuc =DanhMuc::all();
        $nhaCC = NhaCC::all();
        $tong=Cart::getTotal();
        $sp=Cart::getContent();
        return view('web.showcart')
        ->with('sp',$sp)
        ->with('tong',$tong)
        ->with('danhmuc',$danhMuc)
        ->with('nhacc',$nhaCC);
    }
    public function getXoaCart($id)
    {
        if($id=='all')
        {
            Cart::clear();
        }
        else{
            Cart::remove($id);
        }
        return back();
    }
    public function getUpDateCart(Request $request)
    {
        
        Cart::update($request->id,array('quantity'=>array('relative'=>false,'value'=>$request->quantity)));
    }
}

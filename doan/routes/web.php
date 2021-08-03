<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\HoaDonMuaController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HoaDonBanController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\loaiTinController;
use App\Http\Controllers\TinController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\CodeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('admin/dangnhap',[UserController::class,'getDangNhapAdmin']);
Route::post('admin/dangnhap',[UserController::class,'postDangNhapAdmin']);
Route::get('admin/logout',[UserController::class,'getDangXuatAdmin']);
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
  Route::group(['prefix'=>'user'],function(){
    Route::get('danhsach',[UserController::class,'getDanhSach']);
    
    Route::get('them',[UserController::class,'getThem']);
    Route::post('them',[UserController::class,'postThem']);

    Route::get('sua/{id}',[UserController::class,'getSua']);
    Route::post('sua/{id}',[UserController::class,'postSua']);
    Route::get('xoa/{id}',[UserController::class,'getXoa']);
  });
  Route::group(['prefix'=>'danhmuc'],function(){
    Route::get('danhsach',[DanhMucController::class,'getDanhSach']);
    
    Route::get('them',[DanhMucController::class,'getThem']);
    Route::post('them',[DanhMucController::class,'postThem']);

    Route::get('sua/{id}',[DanhMucController::class,'getSua']);
    Route::post('sua/{id}',[DanhMucController::class,'postSua']);
    Route::get('xoa/{id}',[DanhMucController::class,'getXoa']);
  });
  Route::group(['prefix'=>'nhacc'],function(){
    Route::get('danhsach',[NhaCungCapController::class,'getDanhSach']);

    Route::get('them',[NhaCungCapController::class,'getThem']);
    Route::post('them',[NhaCungCapController::class,'postThem']);

    Route::get('sua/{id}',[NhaCungCapController::class,'getSua']);
    Route::post('sua/{id}',[NhaCungCapController::class,'postSua']);
    Route::get('xoa/{id}',[NhaCungCapController::class,'getXoa']);
   
  });
  Route::group(['prefix'=>'sanpham'],function(){
    Route::get('danhsach',[SanPhamController::class,'getDanhSach']);

    Route::get('them',[SanPhamController::class,'getThem']);
    Route::post('them',[SanPhamController::class,'postThem']);

    Route::get('sua/{id}',[SanPhamController::class,'getSua']);
    Route::post('sua/{id}',[SanPhamController::class,'postSua']);
    Route::get('xoa/{id}',[SanPhamController::class,'getXoa']);
  });
  Route::group(['prefix'=>'danhgia'],function(){
    Route::get('xoa/{id}/{idSanPham}',[BinhLuanController::class,'xoa']);
  });
  Route::group(['prefix'=>'hoadonmua'],function(){
    Route::get('danhsach',[HoaDonMuaController::class,'getDanhSach']);
    Route::get('chitiet/{id}',[HoaDonMuaController::class,'getChiTiet']);

    Route::get('them',[HoaDonMuaController::class,'getThem']);
    Route::post('them',[HoaDonMuaController::class,'postThem']);

    Route::get('sua/{id}',[HoaDonMuaController::class,'getSua']);
    Route::post('sua/{id}',[HoaDonMuaController::class,'postSua']);
    Route::get('xoa/{id}',[HoaDonMuaController::class,'getXoa']);
  });
  Route::group(['prefix'=>'hoadonban'],function(){
    Route::get('danhsach',[HoaDonBanController::class,'getDanhSach']);
    Route::get('chitiet/{id}',[HoaDonBanController::class,'getChiTiet']);

    Route::get('them',[HoaDonBanController::class,'getThem']);
    Route::post('them',[HoaDonBanController::class,'postThem']);

    Route::get('xoa/{id}',[HoaDonBanController::class,'getXoa']);
  });
  Route::group(['prefix'=>'thongke'],function(){
    Route::get('danhsach',[ThongKeController::class,'getDanhSach']);
    
  });
  Route::group(['prefix'=>'khachhang'],function(){
    Route::get('danhsach',[KhachHangController::class,'getDanhSach']);
    
    Route::get('them',[KhachHangController::class,'getThem']);
    Route::post('them',[KhachHangController::class,'postThem']);

    Route::get('sua/{id}',[KhachHangController::class,'getSua']);
    Route::post('sua/{id}',[KhachHangController::class,'postSua']);
    Route::get('xoa/{id}',[KhachHangController::class,'getXoa']);
  });
  Route::group(['prefix'=>'loaitin'],function(){
    Route::get('danhsach',[loaiTinController::class,'getDanhSach']);

    Route::get('them',[loaiTinController::class,'getThem']);
    Route::post('them',[loaiTinController::class,'postThem']);

    Route::get('sua/{id}',[loaiTinController::class,'getSua']);
    Route::post('sua/{id}',[loaiTinController::class,'postSua']);
    Route::get('xoa/{id}',[loaiTinController::class,'getXoa']);
   
  });
  Route::group(['prefix'=>'tin'],function(){
    Route::get('danhsach',[TinController::class,'getDanhSach']);

    Route::get('them',[TinController::class,'getThem']);
    Route::post('them',[TinController::class,'postThem']);

    Route::get('sua/{id}',[TinController::class,'getSua']);
    Route::post('sua/{id}',[TinController::class,'postSua']);
    Route::get('xoa/{id}',[TinController::class,'getXoa']);
   
  });
  Route::group(['prefix'=>'slide'],function(){
    Route::get('danhsach',[SlideController::class,'getDanhSach']);
    
    Route::get('them',[SlideController::class,'getThem']);
    Route::post('them',[SlideController::class,'postThem']);

    Route::get('sua/{id}',[SlideController::class,'getSua']);
    Route::post('sua/{id}',[SlideController::class,'postSua']);
    Route::get('xoa/{id}',[SlideController::class,'getXoa']);
  });
  Route::group(['prefix'=>'giamgia'],function(){
    Route::get('danhsach',[CodeController::class,'getDanhSach']);
    
    Route::get('them',[CodeController::class,'getThem']);
    Route::post('them',[CodeController::class,'postThem']);
    
    Route::get('xoa/{id}',[CodeController::class,'getXoa']);
  });
});
Route::get('web/trangchu',[PageController::class,'trangChu']);
Route::get('web/lienhe',[PageController::class,'trangLienHe']);
Route::get('web/tintuc',[PageController::class,'tinTuc']);
Route::get('web/chitiettintuc/{id}',[PageController::class,'chiTietTintuc']);
Route::get('web/trangloaitin/{id}',[PageController::class,'loaiTintuc']);
Route::get('web/trangdanhmuc/{id}',[PageController::class,'trangDanhMuc']);
Route::get('web/trangnhacc/{id}',[PageController::class,'trangNhaCC']);
Route::post('web/timkiemtin',[PageController::class,'timKiemTinTuc']);
Route::post('web/timkiemsanpham',[PageController::class,'timKiemSanPham']);
Route::get('web/chitietsanpham/{id}',[PageController::class,'chiTietSanPham']);
Route::get('web/tatca',[PageController::class,'tatCaSanPham']);
Route::post('/check-code',[CartController::class,'check_code']);


Route::post('binhluan/{id}',[BinhLuanController::class,'postBinhLuan']);
Route::group(['prefix'=>'web'],function(){
    Route::get('cart/add/{id}',[CartController::class,'getAddCart']);
    Route::get('showcart',[CartController::class,'getShowCart']);
    Route::get('cart/xoa/{id}',[CartController::class,'getXoaCart']);
    Route::get('cart/update',[CartController::class,'getUpDateCart']);
});
Route::get('web/logincheckout/checkout',[CheckoutController::class,'getLoginCheckOut']);
Route::post('web/logincheckout/checkout',[CheckoutController::class,'postLoginCheckOut']);
Route::post('web/logincheckout/login',[CheckoutController::class,'postLogin']);
Route::get('web/logincheckout/show_checkout',[CheckoutController::class,'getShowCheckOut']);
Route::post('web/logincheckout/dathang',[CheckoutController::class,'postDatHang']);
Route::get('web/loguotcheckout',[CheckoutController::class,'getLogOutCheckOut']);
//sen mail
Route::post('/send_mail',[PageController::class,'send_mail']);



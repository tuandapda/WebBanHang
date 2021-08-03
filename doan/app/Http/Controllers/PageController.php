<?php

namespace App\Http\Controllers;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\NhaCC;
use App\Models\slide;
use App\Models\loaitin;
use App\Models\tin;
use App\Models\danhgia;
use App\Models\khachang;
use Mail;
use Illuminate\Support\Facades\DB;
use Session;
session_start();
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function trangChu()
    {
        $tinTuc=DB::select('SELECT * FROM tintuc ORDER BY RAND ( ) LIMIT 3');
        $nhaCC = NhaCC::all();
        $danhMuc =DanhMuc::all();
        $spGiamGia = DB::table('SanPham')->Where('GiamGia','>','0')->orderBy('GiaSP', 'asc')->get();
        $spMoi = DB::table('spMoi')->orderBy('GiaSP', 'asc');
        $spMoi=$spMoi->paginate(8);
        $slide= slide::all();
        $ojbDesTop = SanPham::where('DanhMuc_Id','DT')
        ->orderBy('GiaSP', 'asc')->get() ;                  
        return view('web.TrangChu')
        ->with('nhacc',$nhaCC)
        ->with('tinTuc',$tinTuc)
        ->with('danhmuc',$danhMuc)
        ->with('spGiamGia',$spGiamGia)
        ->with('spMoi',$spMoi)
        ->with('slide',$slide)
        ->with('destop',$ojbDesTop);
    }
    public function trangLienHe()
    {
        return view('web.tranglienhe');
    }
    public function trangDanhMuc(Request $request,$id)
    {
        $nhaCC = NhaCC::all();
        $danhmuc1 = danhmuc::find($id);
        $danhMuc =DanhMuc::all();
        if(isset($_GET['sort_by']))
        {
            $sort_by =$_GET['sort_by'];
            if($sort_by=='giam_dan')
            {
                $sp = DB::table('SanPham')
                ->join('danhmuc','SanPham.DanhMuc_Id','=','danhmuc.DanhMuc_Id')
                ->join('nhacungcap','SanPham.NhaCC_Id','=','nhacungcap.NhaCC_Id')
                ->where('SanPham.DanhMuc_Id',$id)
                ->orderBy('GiaSP', 'desc');
                $sp= $sp->paginate(20)->appends(request()->query());
            }elseif($sort_by=='tang_dan')
            {
                $sp = DB::table('SanPham')
                ->join('danhmuc','SanPham.DanhMuc_Id','=','danhmuc.DanhMuc_Id')
                ->join('nhacungcap','SanPham.NhaCC_Id','=','nhacungcap.NhaCC_Id')
                ->orderBy('GiaSP', 'asc')
                ->where('SanPham.DanhMuc_Id',$id);
                $sp= $sp->paginate(20)->appends(request()->query());
            }
        }
        else 
        {
            $sp = DB::table('SanPham')
                ->join('danhmuc','SanPham.DanhMuc_Id','=','danhmuc.DanhMuc_Id')
                ->join('nhacungcap','SanPham.NhaCC_Id','=','nhacungcap.NhaCC_Id')
                ->orderBy('GiaSP', 'asc')
                ->where('SanPham.DanhMuc_Id',$id);
                $sp= $sp->paginate(20);
        }
        // $spNhaCC =SanPham::Where('NhaCC_Id',$id)->orderBy('GiaSP', 'asc')->get();
        return View('web.trangdanhmuc')
        ->with('nhacc',$nhaCC)
        ->with('danhmuc1',$danhmuc1)
        ->with('danhmuc',$danhMuc)
        ->with('sp',$sp);
        
    }
    public function trangNhaCC(Request $request ,$id)
    {
        $nhaCC = NhaCC::all();
        $nhaCC1 = NhaCC::find($id);
        $danhMuc =DanhMuc::all();
        if(isset($_GET['sort_by']))
        {
            $sort_by =$_GET['sort_by'];
            if($sort_by=='giam_dan')
            {
                $sp = DB::table('SanPham')
                ->join('danhmuc','SanPham.DanhMuc_Id','=','danhmuc.DanhMuc_Id')
                ->join('nhacungcap','SanPham.NhaCC_Id','=','nhacungcap.NhaCC_Id')
                ->where('SanPham.NhaCC_Id',$id)
                ->orderBy('GiaSP', 'desc');
                $sp= $sp->paginate(20)->appends(request()->query());
            }elseif($sort_by=='tang_dan')
            {
                $sp = DB::table('SanPham')
                ->join('danhmuc','SanPham.DanhMuc_Id','=','danhmuc.DanhMuc_Id')
                ->join('nhacungcap','SanPham.NhaCC_Id','=','nhacungcap.NhaCC_Id')
                ->orderBy('GiaSP', 'asc')
                ->where('SanPham.NhaCC_Id',$id);
                $sp= $sp->paginate(20)->appends(request()->query());
            }
        }
        else 
        {
            $sp = DB::table('SanPham')
                ->join('danhmuc','SanPham.DanhMuc_Id','=','danhmuc.DanhMuc_Id')
                ->join('nhacungcap','SanPham.NhaCC_Id','=','nhacungcap.NhaCC_Id')
                ->orderBy('GiaSP', 'asc')
                ->where('SanPham.NhaCC_Id',$id);
                $sp= $sp->paginate(20);
        }
        // $spNhaCC =SanPham::Where('NhaCC_Id',$id)->orderBy('GiaSP', 'asc')->get();
        return View('web.trangnhacc')
        ->with('nhacc',$nhaCC)
        ->with('nhacc1',$nhaCC1)
        ->with('danhmuc',$danhMuc)
        ->with('sp',$sp);
        
        
    }
    public function tatCaSanPham(Request $request)
    {
        $nhaCC = NhaCC::all();
        $danhMuc =DanhMuc::all();
        if(isset($_GET['sort_by'])){
            $sort_by =$_GET['sort_by'];
            if($sort_by=='giam_dan'){
                $sp = DB::table('SanPham')
                ->join('danhmuc','SanPham.DanhMuc_Id','=','danhmuc.DanhMuc_Id')
                ->join('nhacungcap','SanPham.NhaCC_Id','=','nhacungcap.NhaCC_Id')
                ->orderBy('GiaSP', 'desc');
                $sp= $sp->paginate(20)->appends(request()->query());
            }elseif($sort_by=='tang_dan')
            {
                $sp = DB::table('SanPham')
                ->join('danhmuc','SanPham.DanhMuc_Id','=','danhmuc.DanhMuc_Id')
                ->join('nhacungcap','SanPham.NhaCC_Id','=','nhacungcap.NhaCC_Id')
                ->orderBy('GiaSP', 'asc');
                $sp= $sp->paginate(20)->appends(request()->query());
            }
        }else {
            $sp = DB::table('SanPham')
                ->join('danhmuc','SanPham.DanhMuc_Id','=','danhmuc.DanhMuc_Id')
                ->join('nhacungcap','SanPham.NhaCC_Id','=','nhacungcap.NhaCC_Id')
                ->orderBy('GiaSP', 'asc');
                $sp= $sp->paginate(20);
        }
        
        return View('web.tatCaSanPham')
        ->with('nhacc',$nhaCC)
        ->with('danhmuc',$danhMuc)
        ->with('sp',$sp);
        
        
    }
    public function chiTietSanPham($id)
    {
        
        $danhMuc =DanhMuc::all();
        $nhaCC = NhaCC::all();
        $sp = SanPham::find($id);
        $lq =$sp->DanhMuc_Id;
        $splq = DanhMuc::find($lq);//sản phẩm liên quan
        return View('web.chitietsanpham')
        ->with('nhacc',$nhaCC)
        ->with('sp',$sp)
        ->with('splq',$splq)
        ->with('danhmuc',$danhMuc);
     
    }
    public function tinTuc()
    {
        $ojbDanhMuc =DanhMuc::all();
        $ojbLoaiTin =loaitin::all();
        $ojbTinTuc = tin::Paginate(5);
        $spMoi=DB::select('SELECT * FROM spmoi ORDER BY RAND ( ) LIMIT 5');
        $tinMoi=DB::select('SELECT * FROM tintuc WHERE  DateDiff(Sysdate(),NgayCapNhat)<30  ORDER BY RAND ( ) LIMIT 3');
        return view('web.trangtintuc')
        ->with('loaiTin',$ojbLoaiTin)
        ->with('danhMuc',$ojbDanhMuc)
        ->with('spMoi',$spMoi)
        ->with('tinMoi',$tinMoi)
        ->with('tinTuc',$ojbTinTuc);
    }
    public function chiTietTintuc($id)
    {
        $ojbDanhMuc =DanhMuc::all();
        $ojbLoaiTin =loaitin::all();
        $ojbTinTuc = tin::find($id);
        $spMoi=DB::select('SELECT * FROM spmoi ORDER BY RAND ( ) LIMIT 5');
        $tinMoi=DB::select('SELECT * FROM tintuc WHERE  DateDiff(Sysdate(),NgayCapNhat)<30  ORDER BY RAND ( ) LIMIT 3');
        return view('web.chitiettintuc')
        ->with('loaiTin',$ojbLoaiTin)
        ->with('danhMuc',$ojbDanhMuc)
        ->with('spMoi',$spMoi)
        ->with('tinMoi',$tinMoi)
        ->with('tinTuc',$ojbTinTuc);
        
    }
    public function loaiTintuc($id)
    {
        
        $ojbLoaiTin =loaitin::all();
        $ojbDanhMuc =DanhMuc::all(); 
        $loaiTin_tk = loaitin::find($id);
        $spMoi=DB::select('SELECT * FROM spmoi ORDER BY RAND ( ) LIMIT 5');
        $tinMoi=DB::select('SELECT * FROM tintuc WHERE  DateDiff(Sysdate(),NgayCapNhat)<30  ORDER BY RAND ( ) LIMIT 3');
        return view('web.trangloaitin')
        ->with('loaiTin',$ojbLoaiTin)
        ->with('danhMuc',$ojbDanhMuc)
        ->with('spMoi',$spMoi)
        ->with('tinMoi',$tinMoi)
        ->with('loaitin_tk',$loaiTin_tk) ;
        
    }
    public function timKiemTinTuc(Request $request)
    {
        $tuKhoa=$request->tuKhoa;
         $Tin_tk=tin::Where ('TieuDe','like',"%".$tuKhoa."%");
         $Tin_tk=$Tin_tk->Paginate(6);
        $Tin_tk->append(['tuKhoa'=>$tuKhoa]);
        return view('web.timkiemtin',['tin_tk'=>$Tin_tk,'tuKhoa'=>$tuKhoa]) ;  
    }
    public function timKiemSanPham(Request $request)
    {
        $tuKhoa=$request->tuKhoa;
        $nhaCC = NhaCC::all();
        $danhMuc =DanhMuc::all();
        if(isset($_GET['sort_by'])){
            $sort_by =$_GET['sort_by'];
            if($sort_by=='giam_dan'){
                $sp = DB::table('SanPham')
                ->join('danhmuc','SanPham.DanhMuc_Id','=','danhmuc.DanhMuc_Id')
                ->join('nhacungcap','SanPham.NhaCC_Id','=','nhacungcap.NhaCC_Id')
                ->where(function($q) use($tuKhoa)
                {$q->orWhere ('TenHang','like','%'.$tuKhoa.'%')
                ->orWhere('MoTa','like','%'.$tuKhoa.'%')
                ->orWhere('GiaSP','like','%'.$tuKhoa.'%')
                ->orWhere('MaHang','like','%'.$tuKhoa.'%');
                })
                ->orderBy('GiaSP', 'desc');
                $sp= $sp->paginate(20)->appends([request()->query(),'tuKhoa'=>$tuKhoa]);
            }elseif($sort_by=='tang_dan')
            {
                $sp = DB::table('SanPham')
                ->join('danhmuc','SanPham.DanhMuc_Id','=','danhmuc.DanhMuc_Id')
                ->join('nhacungcap','SanPham.NhaCC_Id','=','nhacungcap.NhaCC_Id')
                ->where(function($q) use($tuKhoa)
                {$q->orWhere ('TenHang','like','%'.$tuKhoa.'%')
                ->orWhere('MoTa','like','%'.$tuKhoa.'%')
                ->orWhere('GiaSP','like','%'.$tuKhoa.'%')
                ->orWhere('MaHang','like','%'.$tuKhoa.'%');
                })
                ->orderBy('GiaSP', 'asc');
                $sp= $sp->paginate(20)->appends([request()->query(),'tuKhoa'=>$tuKhoa]);
            }
        }else {
            $sp = DB::table('SanPham')
                ->join('danhmuc','SanPham.DanhMuc_Id','=','danhmuc.DanhMuc_Id')
                ->join('nhacungcap','SanPham.NhaCC_Id','=','nhacungcap.NhaCC_Id')
                ->where(function($q) use($tuKhoa)
                {$q->orWhere ('TenHang','like','%'.$tuKhoa.'%')
                ->orWhere('MoTa','like','%'.$tuKhoa.'%')
                ->orWhere('GiaSP','like','%'.$tuKhoa.'%')
                ->orWhere('MaHang','like','%'.$tuKhoa.'%');
                })
                ->orderBy('GiaSP', 'asc');
                $sp= $sp->paginate(20)->appends([request()->query(),'tuKhoa'=>$tuKhoa]);
        }
        
        return View('web.timkiemsanpham')
        ->with('tuKhoa',$tuKhoa)
        ->with('nhacc',$nhaCC)
        ->with('danhmuc',$danhMuc)
        ->with('sp',$sp);  
    }
    
    public function send_mail(Request $request)
    {
        //send mail
        $to_name = "Tuan1996";
        $to_email = "giatuan1996@gmail.com";//send to this email
        $name = $request->input('Ten');
        $email =$request->input('Email');
        $noidung =$request->input('NoiDung');
            
         $data = array('name'=>$name,'noidung'=>$noidung,'email'=>$email); //body of mail.blade.php
               
        Mail::send('send_mail',$data,function($message) use ($to_name,$to_email){

        $message->to($to_email)->subject('Phản Hồi Khách Hàng');//send this mail with subject
        $message->from($to_email,$to_name);//send from this mail

        });
        return redirect('web/lienhe')->with('thongbao','Gửi thành công .');
               
            
    }
}

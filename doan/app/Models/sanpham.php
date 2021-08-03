<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $table='SanPham';
    public $primaryKey='MaHang';
    public $incrementing=false;
    protected $fillable=[
        'MaHang',
        'TenHang',
        'Anh',
        'NhaCC_Id',
        'DanhMuc_Id',
        'GiamGia',
        'NgayTao',
        'MoTa',
        'GiaSP',
       
    ];
    public $timestamps = false;
    //tao quan he 1-1
    public function danhmuc()
    {
        return $this->beLongsTo('App\Models\danhmuc','DanhMuc_Id','DanhMuc_Id');
    }
    public function nhacungcap()
    {
        return $this->beLongsTo('App\Models\nhacc','NhaCC_Id','NhaCC_Id');
    }
    public function DanhGia()
    {
        return $this->hasMany('App\Models\danhgia','ID_SanPham','MaHang');
    }
}

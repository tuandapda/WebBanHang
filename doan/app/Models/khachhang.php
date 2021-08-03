<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    use HasFactory;
    protected $table='KhachHang';
    public $primaryKey='ID';
    public $incrementing=false;
    protected $fillable=[
        'ID',
        'HoTen',
        'Dienthoai',
        'Email',
        'DiaChi',
        'GioiTinh',
        'NgaySinh',
        'TaiKhoan',
        'password',
        'LoaiKH',
    ];
    public $timestamps =false;
}

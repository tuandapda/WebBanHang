<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadonban extends Model
{
    use HasFactory;
    protected $table='HoaDonBan';
    public $primaryKey="MaHoaDon";
    public $incrementing=false;
    public $timestamps =false;
    protected $fillable=[
        'MaHoaDon',
        'TenHoaDon',
        'NgayBan',
        'MoTa',
        'KhachHang_Id',
        'TrangThai',
        'HinhThucThanhToan',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadonmua extends Model
{
    use HasFactory;
    protected $table='HoaDonMua';
    public $primaryKey="MaHoaDon";
    public $incrementing=false;
    public $timestamps =false;
    protected $fillable=[
        'MaHoaDon',
        'TenHoaDon',
        'NgayMua',
        'MoTa',
        'KhachHang_Id',
    ];

}

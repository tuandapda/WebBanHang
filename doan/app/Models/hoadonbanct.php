<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadonbanct extends Model
{
    use HasFactory;
    protected $table='HoaDonBanCT';
    public $incrementing=false;
    public $timestamps =false;
    protected $fillable=[
        'HoaDonID',
        'HangHoaID',
        'SoLuong',
        'GiaBan',
        'TrangThai'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadonmuact extends Model
{
    use HasFactory;
    protected $table='HoaDonMuaCT';
    public $incrementing=false;
    public $timestamps =false;
    protected $fillable=[
        'HoaDonID',
        'HangHoaID',
        'SoLuong',
        'GiaMua',
    ];
}

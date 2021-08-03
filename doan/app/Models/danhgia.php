<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhgia extends Model
{
    use HasFactory;
    protected $table='danhgia';
    public $primaryKey='ID';
    public $incrementing=false;
    protected $fillable=[
        'ID',
        'NgayCapNhat',
        'ID_KhachHang',
        'ID_SanPham',
        'NoiDung',
        'Diem',
        'TieuDe',
    ];
    public $timestamps =false;
    public function khachhang()
    {
        return $this->beLongsTo('App\Models\khachhang','ID_KhachHang','ID');
    }
}

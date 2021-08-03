<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaikhachhang extends Model
{
    use HasFactory;
    protected $table='loaikhachhang';
    public $primaryKey='ID';
    public $incrementing=false;
    protected $fillable=[
        'Id',
        'TenLoai',
    ];
    public $timestamps = false;
}

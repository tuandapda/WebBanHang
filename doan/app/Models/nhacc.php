<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhacc extends Model
{
    use HasFactory;
    protected $table='NhaCungCap';
    public $primaryKey='NhaCC_Id';
    public $incrementing=false;
    protected $fillable=[
        'NhaCC_Id',
        'TenNhaCC',
        'QuocGia',
        'NgayTao',
    ];
    public $timestamps = false;
}

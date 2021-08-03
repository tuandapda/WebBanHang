<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    use HasFactory;
    protected $table='DanhMuc';
    public $primaryKey='DanhMuc_Id';
    public $incrementing=false;
    protected $fillable=[
        'DanhMuc_Id',
        'TenDM',
        'NgayTao',
    ];
    public $timestamps =false;
    //tao quan he 1 -nhieu
    public function SanPham()
    {
        return $this->hasMany('App\Models\SanPham','DanhMuc_Id','DanhMuc_Id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tin extends Model
{
    use HasFactory;
    protected $table='TinTuc';
    public $primaryKey='ID';
    public $incrementing=false;
    protected $fillable=[
        'ID',
        'TieuDe',
        'Anh',
        'NgayCapNhat',
        'NoiDung',
        'LoaiTin_ID',
        'MaHang',
    ];
    public $timestamps = false;
    public function loaitin()
    {
        return $this->beLongsTo('App\Models\loaitin','LoaiTin_ID','ID');
    }
}

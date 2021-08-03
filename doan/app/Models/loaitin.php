<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaitin extends Model
{
    use HasFactory;
    protected $table='loaitin';
    public $primaryKey='ID';
    public $incrementing=false;
    protected $fillable=[
        'ID',
        'Ten',
        'NgayCapNhat',
    ];
    public $timestamps = false;
    public function tin()
    {
        return $this->hasMany('App\Models\tin','LoaiTin_ID','ID');
    }
}

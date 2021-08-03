<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
    use HasFactory;
    protected $table='slide';
    public $primaryKey='ID';
    protected $fillable=[
        'ID',
        'Anh',
        'MoTa',
        'NgayCapNhat',
    ];
    public $timestamps = false;
}

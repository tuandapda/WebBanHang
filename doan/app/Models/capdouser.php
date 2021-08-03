<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class capdouser extends Model
{
    use HasFactory;
    protected $table='capdousers';
    public $primaryKey='ID';
    public $incrementing=false;
    protected $fillable=[
        'Name',
        'NgayTao',
    ];
    public $timestamps =false;
}

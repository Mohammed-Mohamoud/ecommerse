<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class dashboard extends Authenticatable
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'frist_name',
        'last_name',
        'emai',
        'password',
        'permistion_id',
    ];
    public function getPhotoAttribute($value){
        return ($value!==null)? asset('/Admin/images/'.$value):"";
    }
}


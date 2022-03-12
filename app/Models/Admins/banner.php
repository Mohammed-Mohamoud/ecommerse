<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
       'address',
       'name',
       'slug',
       'photo'
    ];
    public function getPhotoAttribute($value){
        return ($value!==null)? asset('/Admin/Banners/'.$value):"";
    }
}

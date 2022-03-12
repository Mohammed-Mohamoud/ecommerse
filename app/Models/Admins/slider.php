<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
      'address',
      'photo'
    ];
    public function getPhotoAttribute($value){
        return ($value!==null)? asset('/Admin/Sliders/'.$value):"";
    }
}

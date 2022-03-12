<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class option extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'product_id',
        'attribute',
    ];
    use HasFactory;
    public function proucts(){
        return $this->belongsToMany(product::class ,'proucts');
    }
    public function attributes(){
        return $this->belongsToMany(attribute::class ,'attributes');
    }
    public function getPhotoAttribute($value){
        return ($value!==null)? asset('/Admin/Attributes/'.$value):"";
    }
}

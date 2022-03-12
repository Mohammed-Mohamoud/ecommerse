<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producImage extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'product_id',
        'photos'
    ];
    public function getPhotosAttribute($value)
    {
        return ($value !== null) ? asset('/Admin/Products/' . $value) : "";
    }
    public function products(){
        return $this->belongsTo(productImage::class,'products');
      }
}

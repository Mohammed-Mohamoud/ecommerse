<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'name',
        'photo',
    ];
    public function parents()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function childerns()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }
    public function scopeChild($query)
    {
        return $query->whereNotNull('parent_id');
    }
    public function getPhotoAttribute($value){
        return ($value!==null)? asset('/Admin/Categories/'.$value):"";
    }
    public function products(){
        return $this->belongsToMany(product::class ,'products');
       }
}

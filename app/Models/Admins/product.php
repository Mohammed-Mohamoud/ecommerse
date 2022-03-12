<?php
namespace App\Models\Admins;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable =[
     'name',
     'price',
     'price_type',
     'special_price',
     'price_star',
     'price_end',
     'selling',
     'quantity',
     'is_active',
     'description'
    ];
    protected $casts = [
        'is_active' => 'boolean',

    ];
    public function getActive()
    {
        return  $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }
    protected $dates = [
        'price_star',
        'price_end',
    ];
    public function brands(){
        return $this->belongsTo(brand::class)->withDefault();
      }
      public function categories(){
       return $this->belongsToMany(category::class ,'product_categories');
      }
      public function tages(){
          return $this->belongsToMany(Tage::class ,'produc_tages');
      }
      public function productImages(){
          return $this->hasMany(producImage::class,'product_id');
        }
        public function productImage(){
            return $this->hasOne(producImage::class,'product_id');
          }
        public function options(){
          return $this->hasMany(option::class ,'product_id');
      }
      public function category(){
          return $this->belongsToMany(category::class ,'categories');
         }

         public function getPhotoAttribute($value){
            return ($value!==null)? asset('/Admin/Products/'.$value):"";
        }

    }

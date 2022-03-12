<?php
namespace App\Models\Admins;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tage extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=
    [
       'name',
    ];
}







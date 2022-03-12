<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admins\slider;
use App\Models\Admins\banner;
use App\Models\Admins\category;
use App\Models\Admins\product;


class sliderController extends Controller
{
    public function front_show_slider(){
        $data = [];
        $id = 4;
        $data['sliders']=slider::get(['address','name','photo']);
        $data['banners']=banner::get(['address','name','photo','slug']);
        $data['categories']=category::get(['name','photo','id']);
        $data['products'] = product::get(['price','name','photo','id','description']);
        return view('Front.layouts.main.main',compact('data'));
    }
}

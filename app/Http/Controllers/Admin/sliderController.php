<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins\slider;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Sliders\createSlider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Admins\dashboard;
use Exception;


class sliderController extends Controller
{
    public function slider_view()
    {

        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
       
        $sliders = slider::get();
        return view('Admin.layouts.slider.slider', compact('sliders','dashboard'));
    }
    public function slider_create(createSlider $request)
    {
        try {
            DB::beginTransaction();
          $file_name = "";
            if ($request->has('photo')) {
                $file_name = uploadImage('Sliders', $request->photo);
            }
           $slider = slider::create([
                'address'=>$request->address,
            ]);
            if ($request->photo != null) {
                $slider->photo = $file_name;
            }
            $slider->name = $request->name;
            $slider->save();
            DB::commit();
            return back()->with('success', 'تم عملية الحفظ بنجاح',);
        } catch (Exception $Ex) {
            DB::rollBack();
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }

    }
    public function slider_edite($id){
        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
        $sliders = slider::get();
        $slider = slider::find($id);
        return view('Admin.layouts.slider.edite',compact('sliders','slider','dashboard'));
    }
    public function slider_update(Request $request){
         try {
            DB::beginTransaction();
            $slider = slider::find($request->id);
            $file_name = "";
            if ($request->has('photo')) {
                $file_name = uploadImage('Sliders', $request->photo);
            }
            if ($request->photo != null) {
                $slider->photo = $file_name;
            }
            $slider->name = $request->name;
            $slider->address = $request->address;
            $slider->save();
            DB::commit();
            return back()->with('success', 'تم عملية الحفظ بنجاح');
        } catch (Exception $Ex) {
            DB::rollback();
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function slider_delete($id){
        try {
            $slider = slider::find($id);
            if ($file_name =  Str::after($slider->photo, 'Admin/')) {
                $image_path = public_path("Admin/{$file_name}");
                if (File::exists($image_path)) {
                    unlink($image_path);
                }
            }
            $slider->delete();
            return back()->with('success', 'تمت علية الحذف بنجاح');
        } catch (Exception $EX) {
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
}

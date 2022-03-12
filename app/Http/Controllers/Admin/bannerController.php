<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Banners\createRequest;
use App\Http\Requests\Admin\Banners\updateRequest;
use App\Models\Admins\banner;
use App\Models\Admins\dashboard;

class bannerController extends Controller
{
    public function banner_view()
    {

        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
       
        $banners = banner::get();
        return view('Admin.layouts.banner.banner', compact('banners','dashboard'));
    }
    public function banner_create(createRequest $request)
    {
        try {
            DB::beginTransaction();
          $file_name = "";
            if ($request->has('photo')) {
                $file_name = uploadImage('Banners', $request->photo);
            }
           $banner = banner::create([
                'address'=>$request->address,
            ]);
            if ($request->photo != null) {
                $banner->photo = $file_name;
            }
            $banner->name = $request->name;
            $banner->slug = $request->slug;
            $banner->save();
            DB::commit();
            return back()->with('success', 'تم عملية الحفظ بنجاح',);
        } catch (Exception $Ex) {
            DB::rollBack();
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }

    }
    public function banner_edite($id){
        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
       
        $banners = banner::get();
        $banner = banner::find($id);
        return view('Admin.layouts.banner.edite',compact('banners','banner','dashboard'));
    }
    public function banner_update(updateRequest $request){
         try {
            DB::beginTransaction();
            $banner = banner::find($request->id);
            $file_name = "";
            if ($request->has('photo')) {
                $file_name = uploadImage('Banners', $request->photo);
            }
            if ($request->photo != null) {
                $banner->photo = $file_name;
            }
            $banner->name = $request->name;
            $banner->slug = $request->slug;
            $banner->address = $request->address;
            $banner->save();
            DB::commit();
            return back()->with('success', 'تم عملية الحفظ بنجاح');
        } catch (Exception $Ex) {
            DB::rollback();
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function banner_delete($id){
        try {
            $banner = banner::find($id);
            if ($file_name =  Str::after($banner->photo, 'Admin/')) {
                $image_path = public_path("Admin/{$file_name}");
                if (File::exists($image_path)) {
                    unlink($image_path);
                }
            }
            $banner->delete();
            return back()->with('success', 'تمت علية الحذف بنجاح');
        } catch (Exception $EX) {
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
}
}

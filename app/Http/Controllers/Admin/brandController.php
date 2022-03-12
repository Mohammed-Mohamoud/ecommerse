<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admins\brand;
use App\Http\Requests\Admin\Brands\createrequest;
use App\Http\Requests\Admin\Brands\updaterequest;
use Illuminate\Support\Facades\DB;
use App\Models\Admins\dashboard;
use Exception;

class brandController extends Controller
{
    public function brand_view()
    {

        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
       
        $brands = brand::get(['id','name']);
        return view('Admin.layouts.layout.Admins.Barnds.create',compact('brands','dashboard'));
    }
    public function brand_create(createrequest $request){
     try {

         brand::create([
           'name'=>$request->name,
         ]);
        return back()->with('success', 'تم عملية الحفظ بنجاح',);

     } catch (Exception $Ex) {
        return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
     }

    }
    public function brand_edite($id){
        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
      
        $brands = brand::get(['id','name']);
        $brand = brand::find($id);
       return view('Admin.layouts.layout.Admins.Barnds.edite',compact('brands','brand','dashboard'));
    }
    public function brand_update(updaterequest $request){
        try {
            $brand = brand::find($request->id);
            $brand->update([
              'name'=>$request->name,
            ]);
           return back()->with('success', 'تم عملية الحفظ بنجاح',);
        } catch (Exception $Ex) {
           return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function brand_delete($id){
        try {
          $brand = brand::find($id);
          $brand->delete();
           return back()->with('success', 'تمت علية الحذف بنجاح',);
        } catch (Exception $Ex) {
           return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tage\create;
use App\Models\Admins\tage;
use App\Models\Admins\dashboard;
use Exception;

class tageController extends Controller
{
    public function tage_view()
    {

        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
       
        $tages = tage::all();
        return view('Admin.layouts.layout.Admins.Tage.create', compact('tages','dashboard'));
    }
    public function tage_create(create $request)
    {
        try {
            tage::create([
                'name' => $request->name,
            ]);
            return back()->with('success', 'تم اضافة علامة البحث بنجاح');
        } catch (Exception $Ex) {
            return back()->with('error', 'فشلت عملية الاضافة الرجاء اعادة المحاولة');
        }
    }
    public function tage_edite($id)
    {
        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
        $tage = tage::find($id);
        $tages = tage::all();
        return view('Admin.layouts.layout.Admins.Tage.edite', compact('tage','tages','dashboard'));
    }
    public function tage_update(create $request)
    {
        try {
            $tage = tage::find($request->id);
            $tage->update([
                'name' => $request->name,
            ]);
            $tage->save();
            return back()->with('success', 'تم عملية تعديل بنجاح');
        } catch (Exception $Ex) {
            return back()->with('error', 'فشلت عملية الاضافة الرجاء اعادة المحاولة');
        }
    }
    public function tage_delete($id)
    {
      try {
        $tage = tage::find($id);
        $tage->delete();
        return back()->with('success','تم عملية العالمة بنجاح');
      } catch (Exception $Ex) {
        return back()->with('error', 'فشلت عملية الاضافة الرجاء اعادة المحاولة');
      }
    }
}

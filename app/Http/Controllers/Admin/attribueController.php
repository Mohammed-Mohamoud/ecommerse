<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Attribute\createRequest;
use App\Http\Requests\Admin\Attribute\updateRequest;
use App\Models\Admins\attribute;
use App\Models\Admins\dashboard;
use Exception;

class attribueController extends Controller
{
    public function attribute_view()
    {

        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
       
        $attributes = attribute::get(['name', 'id']);
        return view('Admin.layouts.layout.Admins.Attribute.create', compact('attributes','dashboard'));
    }
    public function attribute_create(createRequest $request)
    {
        try {

            attribute::create([
                'name' => $request->name,
            ]);
            return back()->with('success', 'تم عملية الحفظ بنجاح',);
        } catch (Exception $Ex) {
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function attribute_edite($id)
    {
        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
        $attributes = attribute::get(['name', 'id']);
        $attribute = attribute::find($id);
        return view('Admin.layouts.layout.Admins.Attribute.edite', compact('attribute', 'attributes','dashboard'));
    }
    public function attribute_update(updateRequest $request)
    {
        try {
            $attribute = attribute::find($request->id);
            $attribute->update([
                'name' => $request->name,
            ]);
            return back()->with('success', 'تم عملية الحفظ بنجاح',);
        } catch (Exception $Ex) {
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function attribute_delete($id)
    {
        try {
            $attribute = attribute::find($id);
            $attribute->delete();
             return back()->with('success', 'تمت علية الحذف بنجاح',);
          } catch (Exception $Ex) {
             return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
          }
    }
}

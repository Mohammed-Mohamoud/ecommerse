<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admins\category;
use App\Http\Requests\Admin\Categories\createRequest;
use App\Http\Requests\Admin\Categories\upadetRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Admins\dashboard;
use Exception;

class categoryController extends Controller
{
    public function category_view()
    {

        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
       
        $categories = category::all();
        return view('Admin.layouts.layout.Admins.Categories.category', compact('categories','dashboard'));
    }
    public  function category_create(createRequest $request)
    {

        try {
            DB::beginTransaction();
            $file_name = "";
            if ($request->has('photo')) {
                $file_name = uploadImage('Categories', $request->photo);
            }
            $category = category::create([
                'name' => $request->name,
            ]);
            if ($request->photo != null) {
                $category->photo = $file_name;
            }
            $category->parent_id = $request->parent_id;
            $category->save();
            DB::commit();
            return back()->with('success', 'تم عملية الحفظ بنجاح',);
        } catch (Exception $Ex) {
            DB::rollBack();
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function category_edite($id)
    {
        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
       
        $categorys = category::find($id);
        $categories = category::all();
        return view('Admin.layouts.layout.Admins.Categories.show', compact('categorys', 'categories','dashboard'));
    }

    public function category_update(upadetRequest $request)
    {
        try {
            DB::beginTransaction();
            $category = category::find($request->id);
            $file_name = "";
            if ($request->has('photo')) {
                $file_name = uploadImage('Categories', $request->photo);
            }
            if ($request->photo != null) {
                $category->photo = $file_name;
            }
            $category->photo = $file_name;
            $category->name = $request->name;
            $category->parent_id = $request->parent_id;
            $category->save();
            DB::commit();
            return back()->with('success', 'تم عملية الحفظ بنجاح');
        } catch (Exception $Ex) {
            DB::rollback();
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function category_delete($id){
        try {
            $category = category::find($id);
            if ($file_name =  Str::after($category->photo, 'Admin/')) {
                $image_path = public_path("Admin/{$file_name}");
                if (File::exists($image_path)) {
                    unlink($image_path);
                }
            }
            $category->delete();
            return back()->with('success', 'تمت علية الحذف بنجاح');
        } catch (Exception $EX) {
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
}

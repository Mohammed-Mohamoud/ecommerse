<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\productCreate;
use App\Models\Admins\product;
use App\Models\Admins\brand;
use App\Models\Admins\category;
use App\Models\Admins\tage;
use App\Models\Admins\attribute;
use App\Models\Admins\option;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Product\attributecreate;
use App\Http\Requests\Admin\Product\descriptioncreate;
use App\Models\Admins\producImage;
use App\Http\Requests\Admin\Product\imagecreate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;   
     use App\Models\Admins\dashboard;

use Exception;


class productController extends Controller
{
    public function product_view()
    {
        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
       
        $data = [];
        $data['categories'] = category::get(['id', 'name']);
        $data['brands'] = brand::get(['id', 'name']);
        $data['tages'] = tage::get(['id', 'name']);
        $data['attributes'] = attribute::get(['id', 'name']);
        $products = product::get(['name', 'price', 'quantity', 'is_active', 'id']);
        return view('Admin.layouts.layout.Admins.Proudct.create', compact('products', 'data','dashboard'));
    }
    public function product_save_Images(Request $request)
    {
        $file = $request->file('photos');
        $file_name = uploadImage('Products', $file);
        return response()->json([
            'name' => $file_name,
            'orignal_name' => $file->getClientOriginalName(),
        ]);
    }
    public function product_create(productCreate $request)
    {
        try {
            DB::beginTransaction();
            if (!$request->has('is_active')) {
                $request->request->add(['is_active' => 0]);
            } else {
                $request->request->add(['is_active' => 1]);
            }
            if (!$request->has('specia')) {
                $request->request->add(['specia' => 0]);
            } else {
                $request->request->add(['specia' => 1]);
            }
            $product = product::create([
                'name' => $request->name,
                'price' => $request->price,
                'selling' => $request->selling,
                'quantity' => $request->quantity,
                'is_active' => $request->is_active,
                'price_type' => $request->price_type,
                'special_price' => $request->special_price,
                'price_star' => $request->price_star,
                'price_end' => $request->price_end,
            ]);
            $product->barnd_id = $request->brand_id;
            $product->save();
            $product->categories()->sync($request->category_id);
            $product->tages()->sync($request->tage_id);
            DB::commit();
            return back()->with('success', 'تم اضافة المنتوج بنجاح');
        } catch (Exception $EX) {
            DB::rollBack();
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function product_create_attribute(attributecreate $request)
    {
        try {
            DB::beginTransaction();
            $option =  option::create([
                'attribute' => $request->attribute,
                'product_id' => $request->product_id,
            ]);
            $file_name = "";
            if ($request->has('photo')) {
                $file_name = uploadImage('Attributes', $request->photo);
            }
            if ($request->photo != null) {
                $option->photo = $file_name;
            }
            $option->price = $request->price;
            $option->attribute_id = $request->attribute_id;
            $option->save();
            DB::commit();
            return back()->with('success', 'تم اضافة الخاصية بنجاح');
        } catch (Exception $EX) {
            DB::rollBack();
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function product_create_description(Request $request)
    {
        try {
            $product = product::find($request->id);
            $product->update([
                'description' => $request->description,
            ]);
            return back()->with('success', 'تم اضافة الوصف بنجاح');
        } catch (Exception $EX) {
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function product_create_Images(imagecreate $request)
    {
        try {
            if ($request->has('photos') && count($request->photos) > 0) {
                $product = product::find($request->id);
                foreach ($request->photos as $photo) {
                    producImage::create([
                        'product_id' => $request->id,
                        'photos'   => $photo,
                    ]);
                }
                $product->photo =  $request->photos[0];
                $product->save();
            }
            return back()->with('success', 'تم عملية الحفظ بنجاح');
        } catch (Exception $EX) {
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function product_edite($id)
    {
        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
        $data = [];
        $data['categories'] = category::get(['id', 'name']);
        $data['brands'] = brand::get(['id', 'name']);
        $data['tages'] = tage::get(['id', 'name']);
        $data['attributes'] = attribute::get(['id', 'name']);
        $data['product'] = product::find($id);
        $data['product']->categories;
        $data['product']->tages;
        $data['product']->options;
        $data['product']->productImages;
        $data['products'] = product::get(['name', 'price', 'quantity', 'is_active', 'id']);
        return view('Admin.layouts.layout.Admins.Proudct.edite', compact('data','dashboard'));
    }
    public function product_update(productCreate $request)
    {
        try {
            DB::beginTransaction();
            $product = product::find($request->id);
            if (!$request->has('is_active')) {
                $request->request->add(['is_active' => 0]);
            } else {
                $request->request->add(['is_active' => 1]);
            }
            if (!$request->has('specia')) {
                $request->request->add(['specia' => 0]);
            } else {
                $request->request->add(['specia' => 1]);
            }
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'selling' => $request->selling,
                'quantity' => $request->quantity,
                'is_active' => $request->is_active,
                'price_type' => $request->price_type,
                'special_price' => $request->special_price,
                'price_star' => $request->price_star,
                'price_end' => $request->price_end,
            ]);
            $product->barnd_id = $request->brand_id;
            $product->save();
            $product->categories()->sync($request->category_id);
            $product->tages()->sync($request->tage_id);
            DB::commit();
            return back()->with('success', 'تم اضافة المنتوج بنجاح');
        } catch (Exception $EX) {
            DB::rollBack();
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function product_edite_attribute(Request $request)
    {
        try {
            DB::beginTransaction();
            $option = option::find($request->id);
            $option->update([
                'attribute' => $request->attribute,
            ]);
            $file_name = "";
            if ($request->has('photo')) {
                $file_name = uploadImage('Attributes', $request->photo);
            }
            if ($request->photo != null) {
                $option->photo = $file_name;
            }
            $option->price = $request->price;
            $option->save();
            DB::commit();
            return back()->with('success', 'تم اضافة الخاصية بنجاح');
        } catch (Exception $EX) {
            DB::rollBack();
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function product_edite_description(descriptioncreate $request)
    {
        try {
            $product = product::find($request->id);
            $product->update([
                'description' => $request->description,
            ]);
            $product->save();
            return back()->with('success', 'تم التعديل الخاصية بنجاح');
        } catch (Exception $EX) {
            DB::rollBack();
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public  function product_edite_Images(Request $request)
    {
        if ($request->product_image) {
            $product = product::find($request->id);
            foreach ($request->product_image as $product_imag) {
                $producImage = producImage::get()
                    ->where('product_id', $product_imag);
                foreach ($producImage as $image) {
                    if ($file_name =  Str::after($image->photos, 'Admin/')) {
                        $image_path = public_path("Admin/{$file_name}");
                        if (File::exists($image_path)) {
                            unlink($image_path);
                        }
                    }
                    $image->delete();
                }
            }
            $product->photo =  $request->photos[0];
            $product->save();
        }
        if ($request->has('photos') && count($request->photos) > 0) {
            foreach ($request->photos as $photo) {
                producImage::create([
                    'product_id' => $request->id,
                    'photos'   => $photo,
                ]);
            }
        }
        return back()->with('success', 'تم عملية الحفظ بنجاح');
    }
    public function product_delete($id)
    {
        $product = product::find($id);
        $productImages = $product->productImages;
        foreach ($productImages as $image) {
            if ($file_name =  Str::after($image->photos, 'Admin/')) {
                $image_path = public_path("Admin/{$file_name}");
                if (File::exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        $product->delete();

        return back()->with('success', 'تم عملية الحذف بنجاح');
    }
    public function info($id)
    {
        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
        $products = product::find($id);
        $products->categories;
        $products->tages;
        $products->productImages;
        $products->options;
        $brand = brand::find($products->barnd_id);
        return view(
            'Admin\layouts\layout\Admins\Proudct\infos\info',
            compact('products', 'brand','dashboard')
        );
    }
}

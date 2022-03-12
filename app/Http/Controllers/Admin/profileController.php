<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\profile_create_login;
use App\Http\Requests\Admin\adminRequest;
use App\Http\Requests\Admin\passwordRequest;
use App\Http\Requests\Admin\createNewUser;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Admins\dashboard;
use Illuminate\Http\Request;


class profileController extends Controller
{
    public function profile_view()
    {
        $dashboard = dashboard::get(['frist_name', 'last_name', 'photo', 'id'])->first();
        return view('Admin.layouts.profile.show-profile', compact('dashboard'));
    }
    public function profile_view_login()
    {
        return view('Admin.layouts.auth.login');
    }
    public function profile_create_login(profile_create_login $request)
    {
        if (auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('admin.view');
        }
        return redirect()->back()->with('error', 'هناك خطأ في البيانات');
    }
    public function profile_logut_login()
    {
        $gaurd = $this->getGaurd();
        $gaurd->logout();
        return redirect()->route('profile.view.login');
    }
    public function getGaurd()
    {
        return auth('admin');
    }
    public function profile_update(adminRequest $request)
    {
        try {
            DB::beginTransaction();
            $file_name = "";
            if ($request->has('photo')) {
                $file_name = uploadImage('images', $request->photo);
            }
            $dashboard =  dashboard::find($request->id);
            $dashboard->update([
                'frist_name' => $request->frist_name,
                'last_name' => $request->last_name,
            ]);
            if ($request->photo != null) {
                $dashboard->photo = $file_name;
            }
            $dashboard->save();
            DB::commit();
            return back()->with('success', 'تم عملية الحفظ بنجاح');
        } catch (Exception $Ex) {
            DB::rollBack();
            return back()->with('error', 'هناك خطأ في الحفظ اعد المحاولة');
        }
    }
    public function profile_update_password(passwordRequest $request)
    {
        $dashboard =  dashboard::find($request->id);
        $dashboard->update([
            'password' => bcrypt($request->password),
        ]);
        $dashboard->save();
    }
    public function profile_show_admin()
    {
        $dashboard = dashboard::get(['frist_name', 'last_name', 'photo', 'id'])->first();
        return view('Admin.layouts.layout.Admins.admin', compact('dashboard'));
    }

}

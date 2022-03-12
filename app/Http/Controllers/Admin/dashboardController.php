<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins\dashboard;

class dashboardController extends Controller
{
    public function admin_view(){

        $dashboard = dashboard::get(['frist_name','last_name','photo','id'])->first();
        return view('Admin.layouts.layout.dashboard',compact('dashboard'));
    }
}

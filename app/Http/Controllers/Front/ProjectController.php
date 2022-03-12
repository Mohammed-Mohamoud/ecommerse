<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Admins\category;

class ProjectController extends Controller
{
    public function front_show_category($id)
    {
    $category = category::find($id);
    return  $category->products();
    }
}

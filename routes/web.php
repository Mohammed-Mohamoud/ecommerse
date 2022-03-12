<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\sliderController;
use App\Http\Controllers\Front\ProjectController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'Project'], function () {
    ////////// Star  Slider ////////
    route::get('',[sliderController::class,'front_show_slider'])
    ->name('front.show.slider');
    ////////// End  Slider ////////
        ////////// Ster  Categories ////////
        route::get('category/{id}',[ProjectController::class,'front_show_category'])
        ->name('front.show.category');
        ////////// End  Categories ////////
});




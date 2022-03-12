<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\profileController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\brandController;
use App\Http\Controllers\Admin\attribueController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\tageController;
use App\Http\Controllers\Admin\sliderController;
use App\Http\Controllers\Admin\bannerController;





Route::group(['prefix' => 'Dashboards', 'middleware' => 'auth:admin'], function () {
    Route::get('admin-view', [dashboardController::class, 'admin_view'])
        ->name('admin.view');
    ################### Start  Profile ###############
    Route::get('profile-view', [profileController::class, 'profile_view'])
        ->name('profile.view');
    Route::get('profile-view-logut', [profileController::class, 'profile_logut_login'])
        ->name('profile.view.logut');
    Route::post('profile-update', [profileController::class, 'profile_update'])
        ->name('profile.update');
    Route::post('profile-update-password', [profileController::class, 'profile_update_password'])
        ->name('profile.update.password');
    Route::get('profile-show-admin', [profileController::class, 'profile_show_admin'])
        ->name('profile.show.admin');
    ################### End  Profile ###############

    ################### Start Categories ###############
    Route::get('category-view', [categoryController::class, 'category_view'])
        ->name('category.view');
    Route::post('category-create', [categoryController::class, 'category_create'])
        ->name('category.create');
    Route::get('category-edite/{id}', [categoryController::class, 'category_edite'])
        ->name('category.edite');
    Route::post('category-update', [categoryController::class, 'category_update'])
        ->name('category.update');
    Route::get('category-delete/{id}', [categoryController::class, 'category_delete'])
        ->name('category.delete');
    ################### End  Categories ###############

    ################### Start Barnds ###############
    Route::get('brand-view', [brandController::class, 'brand_view'])
        ->name('brand.view');
    Route::post('brand-create', [brandController::class, 'brand_create'])
        ->name('brand.create');
    Route::get('brand-edite/{id}', [brandController::class, 'brand_edite'])
        ->name('brand.edite');
    Route::post('brand-update', [brandController::class, 'brand_update'])
        ->name('brand.update');
    Route::get('brand-delete/{id}', [brandController::class, 'brand_delete'])
        ->name('brand.delete');
    ################### End  Barnds ###############

    ################### Start Attributes ###############
    Route::get('attribute-view', [attribueController::class, 'attribute_view'])
        ->name('attribute.view');
    Route::post('attribute-create', [attribueController::class, 'attribute_create'])
        ->name('attribute.create');
    Route::get('attribute-edite/{id}', [attribueController::class, 'attribute_edite'])
        ->name('attribute.edite');
    Route::post('attribute-update', [attribueController::class, 'attribute_update'])
        ->name('attribute.update');
    Route::get('attribute-delete/{id}', [attribueController::class, 'attribute_delete'])
        ->name('attribute.delete');
    ################### End  Attributes ###############

    ################### Start Tages ###############
    Route::get('tage-view', [tageController::class, 'tage_view'])
        ->name('tage.view');
    Route::post('tage-create', [tageController::class, 'tage_create'])
        ->name('tage.create');
    Route::get('tage-edite/{id}', [tageController::class, 'tage_edite'])
        ->name('tage.edite');
    Route::post('tage-update', [tageController::class, 'tage_update'])
        ->name('tage.update');
    Route::get('tage-delete/{id}', [tageController::class, 'tage_delete'])
        ->name('tage.delete');
    ################### End  Tages ###############

    ################### Start Products create ###############
    Route::get('product-view', [productController::class, 'product_view'])
        ->name('product.view');
    Route::post('product-create', [productController::class, 'product_create'])
        ->name('product.create');
    Route::get('product-edite/{id}', [productController::class, 'product_edite'])
        ->name('product.edite');
    Route::post('product-update', [productController::class, 'product_update'])
        ->name('product.update');
    Route::get('product-delete/{id}', [productController::class, 'product_delete'])
        ->name('product.delete');
    Route::post('product-save-Images', [productController::class, 'product_save_Images'])
        ->name('product.save.Images');
    Route::post('product-create-attribute', [productController::class, 'product_create_attribute'])
        ->name('product.create.attribute');
    Route::post('product-create-description', [productController::class, 'product_create_description'])
        ->name('product.create.description');
    Route::post('product-create-Images', [productController::class, 'product_create_Images'])
        ->name('product.create.Images');
        Route::get('product-info/{id}', [productController::class, 'info'])
        ->name('product.info');
    ################### End  Products create ###############
        ################### Start Products edite update ###############
    Route::post('product-edite-attribute', [productController::class, 'product_edite_attribute'])
        ->name('product.edite.attribute');
    Route::post('product-edite-description', [productController::class, 'product_edite_description'])
        ->name('product.edite.description');
    Route::post('product-edite-Images', [productController::class, 'product_edite_Images'])
        ->name('product.edite.Images');
    ################### End  Products edite update ###############
        ################### Start Silders ###############
        Route::get('slider-view', [sliderController::class, 'slider_view'])
        ->name('slider.view');
    Route::post('slider-create', [sliderController::class, 'slider_create'])
        ->name('slider.create');
    Route::get('slider-edite/{id}', [sliderController::class, 'slider_edite'])
        ->name('slider.edite');
    Route::post('slider-update', [sliderController::class, 'slider_update'])
        ->name('slider.update');
    Route::get('slider-delete/{id}', [sliderController::class, 'slider_delete'])
        ->name('slider.delete');
    ################### End  Silders ###############
           ################### Start Banners ###############
           Route::get('banner-view', [bannerController::class, 'banner_view'])
           ->name('banner.view');
       Route::post('banner-create', [bannerController::class, 'banner_create'])
           ->name('banner.create');
       Route::get('banner-edite/{id}', [bannerController::class, 'banner_edite'])
           ->name('banner.edite');
       Route::post('banner-update', [bannerController::class, 'banner_update'])
           ->name('banner.update');
       Route::get('banner-delete/{id}', [bannerController::class, 'banner_delete'])
           ->name('banner.delete');
       ################### End  Silders ###############

});



Route::group(['prefix' => 'Dashboards'], function () {
    ################### Start  Profile ###############
    Route::get('profile-view-login', [profileController::class, 'profile_view_login'])
        ->name('profile.view.login');
    Route::post('profile-create-login', [profileController::class, 'profile_create_login'])
        ->name('profile.create.login');
    ################### End  Profile ###############
});

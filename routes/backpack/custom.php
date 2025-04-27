<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::get('api/article', 'App\Http\Controllers\Api\ArticleController@index');
Route::get('api/article-search', 'App\Http\Controllers\Api\ArticleController@search');

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    // -----
    // CRUDs
    // -----


    Route::crud('landing-page', 'LandingPageCrudController');

    Route::crud('item', 'ItemCrudController');
    Route::crud('fabric-category', 'FabricCategoryCrudController');
    Route::crud('quotation', 'QuotationCrudController');
   

    Route::post('ckeditor/image_upload', 'LandingPageCrudController@ckeditor_image_upload')->name('upload');
    //Route::get('upazila_model/ajax-upazila-options', 'UpazilaCrudController@upazilaOptions');

    Route::crud('page', 'PageCrudController');
        
    //Route::crud('gallery', 'GalleryCrudController');
}); // this should be the absolute last line of this file
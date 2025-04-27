<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Http\Request;
use App\Models\LandingPage;
use App\Models\Page;

function page_fields(){

    $landingPage = LandingPage::find(1);
    $data = $landingPage ? $landingPage->toArray() : array();

    $json_fields = array(
        'topbar_menu_items',
        'carousel_items',
        'home_video_items',
        'home_featured_items',
        'home_fabric_subcategory_items',
        'home_review_items',
        'home_client_logo_items',
        'home_faq_items',
        'home_latest_items',
        'home_office_items',
        'footer_link_items',
        'footer_link_items_section2',
        'social_media_menu_items'
    );
    foreach ($data as $field => $content) {

        if(in_array($field, $json_fields) && !empty($content)){
            $data[$field] = json_decode($content, true);
        }

    }
    //echo "<pre>";print_r($data);exit;

    return $data;
}

function pages($url_title) {
    $data = page_fields();

    $row = Page::where('url_title', $url_title)->first();
    $row = $row ? $row->toArray() : array();

    return array_merge($data, $row);
};

Route::get('/', function () {
    return redirect('/admin');

    $data = page_fields();
    //echo "<pre>";print_r($data);exit;
    return view('pages.home', $data); // view('welcome');
}); 

Route::get('/cookies', function () {
    $data = page_fields();

    return view('pages.cookies', $data);
});

Route::get('/privacy-policy', function () {
    $data = page_fields();

    return view('pages.privacy-policy', $data);
});

Route::get('/terms-of-use', function () {
    $data = page_fields();

    return view('pages.terms-of-use', $data);
});

Route::get('/pages/{url_title}', function ($url_title) {
    $data = pages($url_title);

    return view('pages.page', $data);
});
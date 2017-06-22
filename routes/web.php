<?php

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

Route::get('/', function () {

//    return \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales();

    return view('welcome');
});

Route::get('/test', function () {

    dd(\App\Category::latest()->first()->toArray());


    $category = \App\Category::create();
    $category->contents()->delete();

    $all_locales = array_keys(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales());

    foreach ($all_locales as $locale) {
        $category->contents()->save(new \App\CategoryContent([
            'locale_code' => $locale,
            'name' => $category->id . ' Categorie ' . $locale
        ]));
    }



//    dd($category->content->name) ;
    dd($category->fresh()->toArray());


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

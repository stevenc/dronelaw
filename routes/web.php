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


Auth::routes();

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/home', 'HomeController@index');

Route::resource('company', 'CompanyController', ['only' => [
    'show', 'create', 'store', 'edit', 'update', 'index'
]]);

Route::get('copyright-policy/download', 'CopyrightPolicyController@download');

Route::resource('copyright-policy', 'CopyrightPolicyController', ['only' => [
    'show', 'create', 'store', 'edit', 'update', 'index'
]]);

Route::get('privacy-policy/download', 'PrivacyPolicyController@download');

Route::get('privacy-policy/step/{step}', 'PrivacyPolicyController@editStep');

Route::post('privacy-policy/step/{step}', 'PrivacyPolicyController@updateStep');

Route::get('terms-of-use/download', 'TermsOfUseController@download');

Route::resource('terms-of-use', 'TermsOfUseController', ['only' => [
    'show', 'create', 'store', 'edit', 'update', 'index'
]]);


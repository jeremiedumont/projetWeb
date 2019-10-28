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
    return view('welcome');
});
Route::get('/', 'WelcomeController@index');

Route::get('/shop/{siret}', 'ShopInfoController@index');

Route::get('/researchCity/{param}', 'ResearchByCityController@index');
Route::get('/researchName/{param}', 'ResearchByNameController@index');
Route::get('/myAccount', 'MyAccountController@index');
Route::get('/ajaxMarkers', 'MyAjaxMarkersController@index');
Route::put('/uploadprofilepicture', 'UploadProfilePictureController@index');
Route::post('/newShop', 'NewShopController@index');
Route::post('/addimageshop/{param}', 'AddImageController@index');
Route::put('/updateAccount', 'UpdateAccountController@index');
Route::post('/addmenu/{param}', 'AddMenuController@index');
Route::post('/addHours/{param}', 'AddHoursController@index');
Route::get('/modifyPersInfo', 'ModifyPersInfoController@index');
Route::get('/addShop', 'AddShopController@index');
Route::get('/setMenu/{param}', 'SetMenuController@index');
Route::delete('/deleteMenu', 'DeleteMenuController@index');
Route::delete('/deleteDish', 'DeleteDishController@index');
Route::delete('/deleteAccount', 'DeleteAccountController@index');
Route::delete('/deleteShop', 'DeleteShopController@index');
Route::delete('/deleteHours', 'DeleteHoursController@index');
Route::post('/recordDish/{param}', 'RecordDishController@index');




Route::get('/home', 'HomeController@index')->name('home');

// Authentication Routes...
   Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
   Route::post('login', 'Auth\LoginController@login');
   Route::post('logout', 'Auth\LoginController@logout')->name('logout');

   // Registration Routes...
   Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
   Route::post('register', 'Auth\RegisterController@register');

   // Password Reset Routes...
   Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
   Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
   Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
   Route::post('password/reset', 'Auth\ResetPasswordController@reset');

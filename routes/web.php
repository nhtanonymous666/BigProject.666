<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin/dashboard', 'Admin\HomeController@Index')->name('dashboard.show');

Route::get('/', function () {
    return redirect('index');
});

Route::get('index', 'HomeController@Index')->name('home');

Route::get('{cateurl}.cat.{cateid}', 'CategoryController@show')->name('category.show');

Route::get('{subcateurl}.subcat.{cateid}.{subid}', 'SubCategoryController@show')->name('subcategory.show');

Route::get('{prodname}.prod.{pid}', 'ProductDetailController@show')->name('productdetail.show');

Route::get('cart', 'CartController@show')->name('cart.show')->middleware('auth');
Route::get('listCartHeader', 'CartController@listCartHeader')->name('cart.listheader');
Route::post('add-cart/{prodid}', 'CartController@addcart')->name('cart.add');

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
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Password Confirmation Routes...
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
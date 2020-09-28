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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'StaticPagesController@home')->name('home');                                                 // 首页
Route::get('/help', 'StaticPagesController@help')->name('help');                                             // 帮助
Route::get('/about', 'StaticPagesController@about')->name('about');                                          // 关于

Route::get('signup', 'UsersController@create')->name('signup');                                              // 用户 注册
Route::resource('users', 'UsersController');                                                                 // 个人中心

Route::get('login', 'SessionsController@create')->name('login');                                             // 登录
Route::post('login', 'SessionsController@store')->name('login');                                             // 登录
Route::delete('logout', 'SessionsController@destroy')->name('logout');                                       // 退出登录

Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');                 // 注册用户 激活

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request'); // 重置密码
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');   // 重置密码
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');  // 重置密码
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');                // 重置密码

Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);                         // 发布、删除 微博

Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');              // 我关注的 用户
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');                 // 关注我的 用户
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');                // 关注 用户
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');          // 取消关注 用户


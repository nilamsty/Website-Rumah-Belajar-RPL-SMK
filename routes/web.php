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

Route::get('/', function () {
    return view('welcome');
});

//auth route for both
Route::group(['middleware' => ['auth']], function()
{
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');    
});

//for users
Route::group(['middleware' => ['auth', 'role:user']], function()
{
    Route::get('/dashboard/profilsaya', 'App\Http\Controllers\DashboardController@profil')->name('dashboard.profil');    
});

//for admin
Route::group(['middleware' => ['auth', 'role:admin']], function()
{
    Route::get('/dashboard/manajemenusers', 'App\Http\Controllers\DashboardController@manajemenusers')->name('dashboard.manajemenusers');
    Route::get('/dashboard/manajemenmateri', 'App\Http\Controllers\DashboardController@manajemenmateri')->name('dashboard.manajemenmateri');
    Route::get('/dashboard/manajemenujikom', 'App\Http\Controllers\DashboardController@manajemenujikom')->name('dashboard.manajemenujikom');      
});



require __DIR__.'/auth.php';

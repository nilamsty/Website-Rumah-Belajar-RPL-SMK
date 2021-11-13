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
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');    
    Route::view('/dashboard/profilsaya', view:'profil')->name('profil');
    Route::put('/dashboard/profilsaya', [App\Http\Controllers\ProfilController::class, 'update'])->name('profil.update');
    //Route::put('/dashboard/profilsaya', action: )->name('dashboard.profil');
});

//for users
Route::group(['middleware' => ['auth', 'role:user']], function()
{
    Route::get('/dashboard/materi', [App\Http\Controllers\DashboardController::class, 'materi'])->name('dashboard.materi');
    Route::get('/dashboard/ujikompetensi', [App\Http\Controllers\DashboardController::class, 'ujikom'])->name('dashboard.ujikom');     
    Route::get('/dashboard/grupdiskusi', [App\Http\Controllers\DashboardController::class, 'grupdis'])->name('dashboard.grupdis');
    Route::get('/dashboard/testimoni', [App\Http\Controllers\DashboardController::class, 'testi'])->name('dashboard.testi');
    //Route::view('/dashboard/profilsaya', App\Http\Controllers\DashboardController@profil')->name('dashboard.profil');    
});

//for admin
Route::group(['middleware' => ['auth', 'role:admin']], function()
{
    Route::get('/dashboard/datapengguna', [App\Http\Controllers\DashboardController::class, 'datapengguna'])->name('dashboard.datapengguna');
    Route::get('/dashboard/tambahmateri', [App\Http\Controllers\DashboardController::class, 'tambahmateri'])->name('dashboard.tambahmateri');
    Route::get('/dashboard/buatujian', [App\Http\Controllers\DashboardController::class, 'buatujian'])->name('dashboard.buatujian');     
    Route::get('/dashboard/datatesti', [App\Http\Controllers\DashboardController::class, 'datatesti'])->name('dashboard.datatesti');      
});



require __DIR__.'/auth.php';

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
    Route::get('/materi/detailmateri/{id}', [App\Http\Controllers\MateriController::class, 'show'])->name('materi.detailmateri');
});

//for users
Route::group(['middleware' => ['auth', 'role:user']], function()
{
    Route::get('/dashboard/materi', [App\Http\Controllers\DashboardController::class, 'materi'])->name('dashboard.materi');
    Route::get('/dashboard/ujikompetensi', [App\Http\Controllers\DashboardController::class, 'ujikom'])->name('dashboard.ujikom');     
    Route::get('/dashboard/grupdiskusi', [App\Http\Controllers\DashboardController::class, 'grupdis'])->name('dashboard.grupdis');
    Route::get('/dashboard/testimoni', [App\Http\Controllers\DashboardController::class, 'testi'])->name('dashboard.testi');
});

//for admin
Route::group(['middleware' => ['auth', 'role:admin']], function()
{
    Route::get('/dashboard/datapengguna', [App\Http\Controllers\DashboardController::class, 'datapengguna'])->name('dashboard.datapengguna');
    Route::get('/materi/manajemenmateri', [App\Http\Controllers\MateriController::class, 'index'])->name('dashboard.manajemenmateri');
    Route::get('/materi/tambahmateri', [App\Http\Controllers\MateriController::class, 'create'])->name('materi.tambahmateri');
    Route::post('/materi/simpanmateri', [App\Http\Controllers\MateriController::class, 'store'])->name('materi.simpanmateri');
    Route::get('/materi/ubahmateri/{id}', [App\Http\Controllers\MateriController::class, 'edit'])->name('materi.ubahmateri');
    Route::post('/materi/updatemateri/{id}', [App\Http\Controllers\MateriController::class, 'update'])->name('materi.updatemateri');
    Route::get('/materi/hapusmateri/{id}', [App\Http\Controllers\MateriController::class, 'destroy'])->name('materi.hapusmateri');
    

    Route::get('/dashboard/buatujian', [App\Http\Controllers\DashboardController::class, 'buatujian'])->name('dashboard.buatujian');     
    Route::get('/dashboard/datatesti', [App\Http\Controllers\DashboardController::class, 'datatesti'])->name('dashboard.datatesti');      


});



require __DIR__.'/auth.php';

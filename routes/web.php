<?php

use App\Http\Controllers\KrsController;
use App\Http\Controllers\LoginController;
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

//ROUTE LOGIN MAHASISWA KRS
Route::get('/login', [LoginController::class, 'IndexLogin']);
Route::post('/loginMahasiswa', [LoginController::class, 'actionLoginMahasiswa']);
Route::get('/logoutMahasiswa', [LoginController::class, 'logoutMahasiswa']);

//ROUTE HALAMAN KRS
Route::get('/indexKrs', [KrsController::class, 'indexKrs']);

Route::get('/logout', function () {
    if (session()->has('getNim')) {
        session()->pull('getNim');
    }
    return redirect('login');
});

Route::post('/insertKrs', [KrsController::class, 'insertKrs']);
Route::post('/deleteKrs', [KrsController::class, 'deleteKrs']);
Route::get('/generatePDF', [KrsController::class, 'generatePDF']);

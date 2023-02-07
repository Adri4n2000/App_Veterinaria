<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\CitasController;
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
    return view('auth.login');
});

/* Route::get('/clientes', function () {
    return view('clientes.index');
});

Route::get('clientes/create',[ClientesController::class, 'create']);
*/

Route::resource('clientes',ClientesController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [ClientesController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [ClientesController::class, 'index'])->name('home'); 
});

/*Route::get('/mascotas', function() {
    return view('mascotas.index');
});
Route::get('/mascotas/create', [MascotaController::class,'create']);
*/
Route::resource('mascotas',MascotaController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [MascotaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [MascotaController::class, 'index'])->name('home'); 
});

Route::resource('citas',CitasController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [CitasController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [CitasController::class, 'index'])->name('home'); 
});



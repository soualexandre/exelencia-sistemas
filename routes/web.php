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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/vendas/index', 'App\Http\Controllers\admin\vendasController@index')->name('vendas.index');
    Route::post('/vendas/create', 'App\Http\Controllers\admin\vendasController@store')->name('vendas.create');
    Route::get('/vendas/show', 'App\Http\Controllers\admin\vendasController@show')->name('vendas.show');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/gastos/index', 'App\Http\Controllers\admin\gastosController@index')->name('gastos.index');
    Route::post('/vendas/create', 'App\Http\Controllers\admin\vendasController@store')->name('vendas.create');
    Route::get('/vendas/show', 'App\Http\Controllers\admin\vendasController@show')->name('vendas.show');
});


require __DIR__ . '/auth.php';

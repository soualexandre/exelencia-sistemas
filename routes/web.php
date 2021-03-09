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
})->middleware(['auth'])->name('dashboard');



Route::get('/vendas/index', 'App\Http\Controllers\admin\vendasController@index')->name('vendas.index')->middleware('auth');
Route::post('/vendas/create', 'App\Http\Controllers\admin\vendasController@store')->name('vendas.create')->middleware('auth');

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/vendas/index', 'App\Http\Controllers\admin\vendasController@index')->name('vendas.index');
// });

require __DIR__.'/auth.php';

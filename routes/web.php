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

Route::resource('/produk', '\App\Http\Controllers\ProdukController')->names([
    'index' => 'produk.index',
    'show' => 'produk.show',
    'create' => 'produk.create',
    'store' => 'produk.store',
    'update' => 'produk.update',
    'destroy' => 'produk.destroy',
    'edit'  => 'produk.edit'
]);

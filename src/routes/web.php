<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('');
});
// PG01商品一覧
Route::get('/products', [ProductController::class, 'index']);
// PG04商品登録画面
Route::get('/products/register',[ProductController::class,'create']);
// PG04商品登録処理
Route::post('/products/register',[ProductController::class,'store']);
// PG02商品詳細
Route::get('/products/detail/{id}',[ProductController::class,'show']);
// PG03商品更新画面
Route::get('/products/{id}/update',[ProductController::class,'edit']);
// PG03商品更新処理
Route::post('/products/{id}/update',[ProductController::class,'update']);
// PG05商品検索
Route::get('/products/search',[ProductController::class,'search']);
// PG06商品削除処理
Route::post('/products/{productId}/delete',[ProductController::class,'delete']);

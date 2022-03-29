<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;

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
Route::get('admin/create',[adminController::class,'Create']);
Route::post('admin/Register',[adminController::class,'Register']);
Route::get('admin/login',[adminController::class,'Login']);
Route::post('admin/dologin',[adminController::class,'DoLogin'])
;
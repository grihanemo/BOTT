<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testcontroller;
use App\Http\Controllers\IpController;

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
Route::get('/php',function(){
    phpinfo();
});
//роут проверка на палиндром
Route::get('/palindrome',[Testcontroller::class,'Proverka'])->middleware('TestMiddleware');
//Route::get('/palindrome','App\Http\Controllers\Testcontroller@Proverka')->middleware('TestMiddleware');
//роут вывода ip
Route::get('/ip',[IpController::class,'Otvet']);


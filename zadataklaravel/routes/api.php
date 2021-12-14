<?php

use App\Http\Controllers\PrijaveController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VrstaPrijaveController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rute za korisnike
//Route::get('/users', [UserController::class,'index']);
//Route::get('/users/{id}', [UserController::class,'show']);
//Route::resource('users',UserController::class);


//rute za prijave
//Route::get('prijave',[PrijaveController::class,'index']);
//Route::get('prijave/{id}',[PrijaveController::class,'show']);
//Route::resource('prijave',PrijaveController::class);

//rute za profesore
//Route::get('profesori',[ProfesorController::class,'index']);
//Route::get('profesori/{id}',[ProfesorController::class,'show']);
Route::resource('profesori',ProfesorController::class);

//rute za vrste prijava
//Route::get('vrste',[VrstaPrijaveController::class,'index']);
//Route::get('vrste/{id}',[VrstaPrijaveController::class,'show']);
Route::resource('vrste',VrstaPrijaveController::class);

//ruta za funkciju register
Route::post('/register',[AuthController::class, 'register']);

//ruta za funkciju login
Route::post('/login',[AuthController::class, 'login']);

//grupna ruta sluzi da napravi grupaciju ruta i onda mozemo jedno pravilo tj ogranicenje da primenimo na svim tim rutama
//middleware... znaci da ne mozemo da pristupimo rutama ukoliko nismo autorizovani
//npr ulogovani na stranicu
//poslednjoj ruti moze da pristupi bilo ko, stoji van grupne rute
Route::group(['middleware'=>['auth:sanctum']], function() {
    Route::get('/profile',function(Request $request) {
        return auth()->user();
    });
    Route::resource('prijave',PrijaveController::class)->only(['update','store','destroy']);
    Route::resource('users',UserController::class);
    Route::post('/logout',[AuthController::class,'logout']);
});
Route::resource('prijave',PrijaveController::class)->only(['index']);
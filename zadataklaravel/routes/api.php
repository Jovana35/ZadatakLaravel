<?php

use App\Http\Controllers\PrijaveController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VrstaPrijaveController;

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
Route::resource('users',UserController::class);


//rute za prijave
//Route::get('prijave',[PrijaveController::class,'index']);
//Route::get('prijave/{id}',[PrijaveController::class,'show']);
Route::resource('prijave',PrijaveController::class);

//rute za profesore
//Route::get('profesori',[ProfesorController::class,'index']);
Route::get('profesori/{id}',[ProfesorController::class,'show']);
Route::resource('profesori',ProfesorController::class);

//rute za vrste prijava
//Route::get('vrste',[VrstaPrijaveController::class,'index']);
Route::get('vrste/{id}',[VrstaPrijaveController::class,'show']);
Route::resource('vrste',VrstaPrijaveController::class);


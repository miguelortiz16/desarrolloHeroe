<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\HeroController;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('hero',[HeroController::class,"index"]);
Route::get('Getonehero',[HeroController::class,"getOneHero"]);
Route::get('hero/{id}',[HeroController::class,"show"]);
Route::post('hero',[HeroController::class,"store"]);
Route::put('hero/{id}',[HeroController::class,"update"]);
Route::delete('hero/{id}',[HeroController::class,"deleteHero"]);
Route::put('likeHero/{id}',[HeroController::class,"LikeHero"]);
Route::put('dislikeHero/{id}',[HeroController::class,"dislikeHero"]);
Route::put('statusHero/{id}',[HeroController::class,"statusHero"]);

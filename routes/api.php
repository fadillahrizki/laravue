<?php

use App\Http\Controllers\ArtistController;
use Illuminate\Http\Request;
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

Route::prefix('artist')->group(function(){
    
    Route::get('',[ArtistController::class,'index']);
    Route::get('most-popular',[ArtistController::class,'most_popular']);
    Route::get('followers',[ArtistController::class,'followers']);
    Route::get('latest',[ArtistController::class,'latest']);
    Route::get('longest',[ArtistController::class,'longest']);
    Route::post('store',[ArtistController::class,'store']);

});
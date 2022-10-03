<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TabgController;

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

Route::get('/tabg/json', [TabgController::class,'json'])->name('tabg.json');
Route::get('/tabg/show_json/{gid}', [TabgController::class,'show_json'])->name('tabg.show.json');
Route::post('/tabg/store_json/{gid}', [TabgController::class,'store_json'])->name('tabg.store.json');
Route::delete('/tabg/delete_json/{gid}', [TabgController::class,'delete_json'])->name('tabg.delete.json');
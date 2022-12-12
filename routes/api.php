<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('mobilehome', [App\Http\Controllers\MobileController::class, 'mobilehome'])->name('mobilehome');
Route::get('getHeadline', [App\Http\Controllers\MobileController::class, 'getHeadline'])->name('getHeadline');
Route::get('getTags', [App\Http\Controllers\MobileController::class, 'getTags'])->name('getTags');
Route::get('getpage', [App\Http\Controllers\MobileController::class, 'getpage'])->name('getpage');
Route::get('getacara', [App\Http\Controllers\MobileController::class, 'getacara'])->name('getacara');
Route::get('imagebyid', [App\Http\Controllers\MobileController::class, 'imagebyid'])->name('imagebyid');
Route::get('reviewbyid', [App\Http\Controllers\MobileController::class, 'reviewbyid'])->name('reviewbyid');
Route::post('reviewbyid', [App\Http\Controllers\MobileController::class, 'reviewbyid'])->name('reviewbyid');
Route::get('storereview', [App\Http\Controllers\MobileController::class, 'storereview'])->name('storereview');

Route::get('getInfo', [App\Http\Controllers\GooglePlayController::class, 'getInfo'])->name('getInfo');

Route::get('mobileactionlogin', [App\Http\Controllers\LoginController::class, 'mobileactionlogin'])->name('mobileactionlogin');
Route::get('mobileactionlogout', [App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('mobilepostRegistration', [App\Http\Controllers\LoginController::class, 'mobilepostRegistration'])->name('mobilepostRegistration');

Route::apiResource('/search', App\Http\Controllers\Api\SearchController::class);

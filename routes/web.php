<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controller\DestinasiController;
use app\Http\Controller\HomeController;

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

// Route::get('/', function () {
//     return view('pages.home');
// });
Route::post('actionlogin', [App\Http\Controllers\LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::post('postRegistration', [App\Http\Controllers\LoginController::class, 'postRegistration'])->name('postRegistration');
Route::get('register', 'LoginController@register');
Route::get('login', 'LoginController@login');

// Route::resource('/','HomeController');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('destinasi/delete', 'DestinasiController@delete');

Route::get('/destinasi/admin', 'DestinasiController@admin');
Route::get('akomodasi/admin', 'AkomodasiController@admin');
Route::get('kuliner/admin', 'KulinerController@admin');
Route::get('acara/admin', 'AcaraController@admin');
Route::get('fasum/admin', 'FasumController@admin');
Route::resource('destinasi', 'DestinasiController');
Route::resource('akomodasi', 'AkomodasiController');
Route::resource('kuliner', 'KulinerController');

// Route::post('imageUpdate','ImageController');
Route::post('imageUpdate', [App\Http\Controllers\ImageController::class, 'imageUpdate'])->name('imageUpdate');
Route::post('imageAdd', [App\Http\Controllers\ImageController::class, 'imageAdd'])->name('imageAdd');
Route::get('hapus', [App\Http\Controllers\ImageController::class, 'hapus'])->name('hapus');
Route::resource('images', 'ImageController');


Route::resource('category', 'CategoryController');
Route::resource('subcategory', 'SubCategoryController');
Route::resource('item', 'TempatController');
Route::resource('review', 'ReviewController');
Route::post('addReply', [App\Http\Controllers\ReviewController::class, 'addReply'])->name('addReply');
Route::resource('tempat', 'TempatController');
Route::resource('headline', 'HeadlineController');

Route::resource('acara', 'AcaraController');

Route::get('/cari', [App\Http\Controllers\TempatController::class, 'cari'])->name('cari');
Route::get('/admin/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('edit');

Route::resource('admin', 'AdminController');
// Route::resource('acara','AcaraController');
Route::get('fullcalender', 'AcaraController@index');
Route::post('fullcalenderAjax', 'AcaraController@ajax');
Route::resource('fasum', 'FasumController');

Route::get('/category', function () {
    return view('pages.category');
});

Route::get('/auth/redirect', [App\Http\Controllers\LoginController::class, 'redirectToProvider'])->name('redirectToProvider');
Route::get('/auth/callback', [App\Http\Controllers\LoginController::class, 'handleProviderCallback'])->name('handleProviderCallback');

Route::get('/setadmin', [App\Http\Controllers\LoginController::class, 'setadmin'])->name('setadmin');
Route::get('/setnonadmin', [App\Http\Controllers\LoginController::class, 'setnonadmin'])->name('setnonadmin');
Route::get('/setsuperadmin', [App\Http\Controllers\LoginController::class, 'setsuperadmin'])->name('setsuperadmin');
Route::get('/setnonsuperadmin', [App\Http\Controllers\LoginController::class, 'setnonsuperadmin'])->name('setnonsuperadmin');

Route::get('forget-password', [App\Http\Controllers\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [App\Http\Controllers\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [App\Http\Controllers\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [App\Http\Controllers\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/add-place', [App\Http\Controllers\AdminController::class, 'addPlace'])->name('addPlace');
Route::post('/add-place', [App\Http\Controllers\AdminController::class, 'addingPlace'])->name('addingPlace');

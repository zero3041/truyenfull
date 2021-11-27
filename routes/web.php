<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ChapterTranhController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\TruyenTranhController;
use App\Http\Controllers\SachController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleDrive;
use App\Http\Controllers\Auth\LoginController;


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

Route::get('/', [IndexController::class,'home']);
Route::get('/sachtruyen_admin', [LoginController::class,'login'])->name('login');
Route::get('/danh-muc/{slug}', [IndexController::class,'danhmuc']);
Route::get('/xem-truyen/{slug}', [IndexController::class,'xemtruyen']);
Route::get('/xem-chapter/{slug_truyen}/{slug}', [IndexController::class,'xemchapter']);
Route::get('/xem-truyen-tranh/{slug_truyen}/{slug}', [IndexController::class,'xemtruyentranh']);
Route::get('/the-loai/{slug}', [IndexController::class,'theloai']);

Route::get('/doc-sach', [IndexController::class,'docsach']);
Route::post('/xemsachnhanh', [IndexController::class,'xemsachnhanh']);

Route::get('/truyen-tranh', [IndexController::class,'truyentranh']);
Route::get('/truyen-tranh/{slug}', [IndexController::class,'truyentranh']);
Route::get('/tag/{tag}', [IndexController::class,'tag']);
Route::post('/show-tranh', [IndexController::class,'show_tranh']);
Route::post('/autocomplete-ajax',[IndexController::class,'autocomplete_ajax']);
Route::post('/tim-kiem', [IndexController::class,'timkiem']);
Route::post('/truyennoibat', [TruyenController::class,'truyennoibat']);
Route::post('/tabs-danhmuc', [IndexController::class,'tabs_danhmuc']);
Route::get('/kytu/{kytu}', [IndexController::class,'kytu']);


Auth::routes();
// Auth::routes([
//   'register' => false, // Registration Routes...
//   'reset' => false, // Password Reset Routes...
//   'verify' => false, // Email Verification Routes...
  
// ]);
Route::group(['middleware' => ['auth']], function() {
	
	Route::resource('/danhmuc', DanhmucController::class);
	Route::resource('/truyen', TruyenController::class);
	Route::resource('/sach', SachController::class);
	Route::resource('/chapter', ChapterController::class);
	Route::resource('/theloai', TheloaiController::class);
	Route::resource('/information', InformationController::class);
	Route::resource('/truyentranh', TruyenTranhController::class);
	Route::resource('/chaptertranh', ChapterTranhController::class);
	Route::get('chapter_truyentranh/{slug}', [ChapterTranhController::class, 'chapter_truyentranh']);
	Route::get('delete-file/{filename}/{extension}/{timestamp}', [ChapterTranhController::class, 'delete_file']);

	Route::get('/home', [UserController::class, 'index'])->name('home');
	Route::get('/impersonate/user/{id}', [UserController::class,'impersonate']);
	Route::get('/user/stopImpersonate', [UserController::class,'stopImpersonate']);
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

Route::get('/storage-link', function(){
    return Artisan::call('storage:link');
    
});
Route::get('/create-sitemap', function(){
    return Artisan::call('sitemap:create');
   
});
Route::get('/custom_error', function(){
    return Artisan::call('php artisan vendor:publish --tag=laravel-errors');
  
});

Route::get('/assignRole/{id}', [HomeController::class, 'assignRole']);
Route::post('/insert_roles/{id}', [HomeController::class, 'insert_roles']);
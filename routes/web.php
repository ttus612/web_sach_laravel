<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\SachController;
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
//     return view('layout');
// });

Route::get('/', [IndexController::class,'home']);

Route::get('/danh-muc/{slug}', [IndexController::class,'danhmuc']);

Route::get('/xem-truyen/{slug}', [IndexController::class,'xemtruyen']);

Route::get('/xem-chapter/{slug}', [IndexController::class,'xemchapter']);

Route::get('/the-loai/{slug}', [IndexController::class,'theloai']);

Route::post('/tim-kiem', [IndexController::class,'timkiem']);

Route::post('/timkiem-ajax', [IndexController::class,'timkiem_ajax']);

Route::get('/tag/{tag}', [IndexController::class,'tag']);

Route::get('/doc-sach', [IndexController::class,'docsach']);

Route::post('/xemsachnhanh', [IndexController::class,'xemsachnhanh']);

Route::get('/dang-ky', [IndexController::class,'dangky'])->name('dang-ky');

Route::get('/dang-nhap', [IndexController::class,'dangnhap'])->name('dang-nhap');

Route::get('/dang-xuat', [IndexController::class,'sign_out'])->name('dang-xuat');

Route::get('/yeu-thich', [IndexController::class,'yeu_thich'])->name('yeu-thich');

Route::post('/register-publisher', [IndexController::class,'register_publisher'])->name('register-publisher');

Route::post('/login-pulisher', [IndexController::class,'login_pulisher'])->name('login-pulisher');

// Route::post('/themyeuthich', [IndexController::class,'themyeuthich'])->name('themyeuthich');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/danhmuc', DanhMucController::class);

Route::resource('/truyen', TruyenController::class);

Route::resource('/sach', SachController::class);

Route::resource('/chapter', ChapterController::class);

Route::resource('/theloai', TheLoaiController::class);
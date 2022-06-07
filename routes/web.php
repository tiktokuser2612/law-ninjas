<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ResourcesController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\Admin\ArenaController;

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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('/admin',[AdminController::class]);
Route::get('/admin/login', [AdminController::class,'admin'])->name('/admin/login');
Route::post('/admin/login-post', [AdminController::class,'adminLogin'])->name('adminLogin');

Route::group(['middleware' => 'auth:admin'], function () {
   // Route::get('/admin/login', [DashboardController::class,'index'])->name('/admin/login');
    Route::get('logout', [AdminController::class,'logout'])->name('logout');
    Route::get('/admin', [AdminController::class,'admin'])->name('/admin/login');

    Route::get('/admin/users', [AdminUserController::class,'index'])->name('index');
    Route::get('/admin/dashboard', [DashboardController::class,'index'])->name('index');
    Route::get('/admin/users/add', [AdminUserController::class,'create']);
    Route::post('/admin/users/add', [AdminUserController::class,'store']);
    Route::get('admin/users/delete/{id}',[AdminUserController::class,'destroy']);
    Route::get('admin/users/edit/{id}',[AdminUserController::class,'edit']);
    Route::post('admin/users/update/{id}', [AdminUserController::class,'update']);
    Route::post('admin/updateUsersStatus',[AdminUserController::class,'updateStatus'])->name('updateStatus');
    
  
    Route::get('/admin/Resources', [ResourcesController::class,'index'])->name('/admin/Resources');
    Route::get('/admin/Resources/add', [ResourcesController::class,'create'])->name('/admin/Resources/add');
    Route::post('/admin/Resources/add', [ResourcesController::class,'store'])->name('/admin/Resources/add');
    Route::get('/admin/Resources/edit/{id}', [ResourcesController::class,'edit'])->name('/admin/Resources/edit');
    Route::post('/admin/Resources/update/{id}', [ResourcesController::class,'update'])->name('/admin/Resources/update');
    Route::get('/admin/Resources/delete/{id}', [ResourcesController::class,'destroy']);   
    Route::post('admin/updateResourcesStatus',[ResourcesController::class,'updateStatus'])->name('updateStatus');
    
    Route::get('/admin/videos', [VideosController::class,'index'])->name('video.index');
    Route::get('/admin/videos/add', [VideosController::class,'create'])->name('/admin/videos/add');
    Route::post('/admin/videos/add', [VideosController::class,'store'])->name('store');
    Route::get('/admin/videos/delete/{id}', [VideosController::class,'destroy']);
    Route::get('/admin/videos/edit/{id}', [VideosController::class,'edit']);  
    Route::post('/admin/videos/update/{id}', [VideosController::class,'update']); 
    Route::post('admin/updateVideosStatus',[VideosController::class,'updateStatus'])->name('updateStatus');
    
    Route::get('/admin/arena', [ArenaController::class,'index']);
    Route::get('/admin/arena/add', [ArenaController::class,'create']);
    Route::post('/admin/arena/add', [ArenaController::class,'store']);
    Route::get('/admin/arena/delete/{id}', [ArenaController::class,'destroy']);
    Route::get('/admin/arena/edit/{id}', [ArenaController::class,'edit']);  
    Route::post('/admin/arena/update/{id}', [ArenaController::class,'update']); 
    Route::post('admin/updateArenaStatus',[ArenaController::class,'updateStatus'])->name('updateStatus');
    Route::get('/admin/arena/show/{id}', [ArenaController::class,'show']); 

    Route::get('admin/profile', [ProfileController::class,'index'])->name('/admin/profile');
    Route::post('admin/update', [ProfileController::class,'update'])->name('/admin/update{$id}');
    Route::post('admin/reset/', [ProfileController::class,'reset'])->name('/admin/reset');
    Route::get('admin/profile', [ProfileController::class,'edit']);
    Route::get('admin/changePassword', [ProfileController::class,'changePassword']);
   
});

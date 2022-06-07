<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SecurityController;
use App\Http\Controllers\API\VideosController;
use App\Http\Controllers\API\ResourcesController;
use App\Http\Controllers\API\ArenaController;
use App\Http\Controllers\API\PolicysController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\HomeController;
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
Auth::routes();

Route::post('getkeys', [SecurityController::class, 'getkeys']);
Route::post('testing', [SecurityController::class, 'testing']);

Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('sociallogin', [UserController::class, 'sociallogin'])->name('sociallogin');


Route::post('sendotp',[UserController::class,'sendotp'])->name('sendotp');
Route::post('verifyOTP',[UserController::class,'verifyOTP'])->name('verifyOTP');
Route::post('forgotpassword',[UserController::class,'forgotpassword'])->name('forgotpassword');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/getprofile',[UserController::class,'getprofile'])->name('getprofile');
    Route::post('/logout', [UserController::class, 'logout'])->name('/logout');
    Route::post('updateImage',[UserController::class,'updateImage'])->name('updateImage');
    Route::post('updateProfile',[UserController::class,'updateProfile'])->name('updateProfile');
    Route::post('logout',[UserController::class,'logout'])->name('logout');
    Route::post('changepassword',[UserController::class,'changepassword'])->name('changepassword');
    Route::post('aboutus',[PolicysController::class,'aboutus'])->name('aboutus');
    Route::post('privacy',[PolicysController::class,'privacy'])->name('privacy');
    Route::post('termsConditions',[PolicysController::class,'termsConditions'])->name('termsConditions');
    Route::post('getHomeDetails',[HomeController::class,'getHomeDetails'])->name('getHomeDetails');
  
    //Admin Panel API 
    Route::post('getVideoDetails',[VideosController::class,'getVideoDetails']);
    Route::post('searchVideo',[VideosController::class,'SearchVideo']);
    Route::post('getResourcesDetails',[ResourcesController::class,'getResourcesDetails']);
    Route::post('getArenaDetails',[ArenaController::class,'getArenaDetails']);
    Route::post('arenaPost/add',[PostController::class,'store']);
    Route::post('arenaPost/like',[ArenaController::class,'like']);

    Route::post('arenaPost/comment',[CommentController::class,'index']);
    Route::post('arenaPost/comment/add',[CommentController::class,'store']);
    Route::post('arenaPost/comment/edit/{id}',[CommentController::class,'edit']);
    Route::post('arenaPost/comment/destroy/{id}',[CommentController::class,'destroy']);
});




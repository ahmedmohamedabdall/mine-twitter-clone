<?php

use App\Http\Controllers\Admin\AdmincommentsController;
use App\Http\Controllers\Admin\adminDashboardcontroller;
use App\Http\Controllers\Admin\AdminIdeasController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\dashboard_Controlle;
use App\Http\Controllers\feedController;
use App\Http\Controllers\followerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ideaLike;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('lang/{lang}',function($lang){
    if (!in_array($lang,['en','zh_CN'])) {
        abort(404);
    }

    session()->put('locale', $lang);
   
app()->setLocale($lang);

return redirect()->back()->with('success','local language changed to '.$lang);
})->name('lang');

Route::get('/', [dashboard_Controlle::class, 'index'])->name('dashboard');


Route::get('/terms', function () {
    return view('terms');
})->name('terms');



Route::resource('idea',IdeaController::class)->except('create','index','show')->middleware('auth');


Route::resource('idea', IdeaController::class)->only( 'show');


Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');




Route::resource('users',UserController::class)->only(['show','edit','update'])->middleware('auth');



Route::get('/{user}/profile', [UserController::class,'profile'])->name('profile');



Route::Post('users/{user}/follow',[followerController::class,'follow'])->middleware('auth')->name('user.follow');



Route::Post('users/{user}/unfollow', [followerController::class,'unfollow'])->middleware('auth')->name('user.unfollow');




Route::Post('idea/{idea}/like', [ideaLike::class, 'like'])->middleware('auth')->name('idea.like');



Route::Post('idea/{idea}/unlike', [ideaLike::class, 'unlike'])->middleware('auth')->name('idea.unlike');


Route::get('/feed', feedController::class)->middleware('auth')->name('feed');

Route::middleware(
    ['auth','can:admin']
)->prefix('/admin')->as('admin.')->group(function(){
    Route::get('/',[adminDashboardcontroller::class,'index'])->name('dashboard');
    Route::resource('/users',AdminUsersController::class)->only('index');
    Route::resource('/ideas',AdminIdeasController::class)->only('index');
    Route::resource('/comments',AdminCommentsController::class)->only('index','destroy');
});

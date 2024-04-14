<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\uploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CastController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ImportProductController;
use Spatie\Permission\Middlewares\RoleMiddleware;
use App\Http\Controllers\Frontend\MovieController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Admin\MovieTrailerController;
use App\Http\Controllers\Frontend\MovieSingleController;
use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Frontend\FavoriteController;
use App\Http\Controllers\Frontend\MovieController as FrontendMovieController;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified',])->name('dashboard');

Route::middleware(['auth' , 'role:Admin'])->name('admin')->prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index']);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('casts', CastController::class);
    Route::resource('movies', AdminMovieController::class);
    Route::resource('traileres', MovieTrailerController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


 


});
Route::get('/singlemovie/{id}' , [MovieSingleController::class , 'getMovieDetailes'])->name('singleMovie');
Route::get('home' , [HomeController::class , 'homePage'])->name('home');
Route::get('movies' , [FrontendMovieController::class , 'index'])->name('allMovies');
Route::get('topMovies' , [FrontendMovieController::class , 'topMovie'])->name('topMovies');
Route::get('moviesByCategories/{id}' , [CategoryController::class , 'moviesByCategory'])->name('categoryMovies');
Route::get('moviesByCategories' , [CategoryController::class , 'index'])->name('selectCategory'); 
Route::post('addToFavorite/{movie}/{user}' , [FavoriteController::class , 'addFavoriteMovies'])->name('addToFavorite');
Route::get('favoriteMovies/{user}' , [FavoriteController::class , 'index'])->name('favoriteMovies');

Route::get('upload', [UploadController::class, 'index'])->name('upload.index');
Route::post('upload', [UploadController::class, 'store'])->name('upload.store');
Route::get('download/{id}' , [AdminMovieController::class , 'downloadFile'])->name('download');
Route::get('watchOnline/{id}' , [AdminMovieController::class , 'watchOnline'])->name('watchOnline');
Route::post('search' , [HomeController::class , 'search'])->name('search');
Route::post('search' , [MovieController::class , 'search'])->name('search');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__.'/auth.php';

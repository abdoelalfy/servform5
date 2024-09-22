<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreUserControlelr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\QuestionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login',[StoreUserControlelr::class,'storeUser'])->name('login');


Route::post('user/create',[StoreUserControlelr::class,'adminusercreate'])->name('adminusercreate')->middleware('auth:admin');


Route::get('/welcome', [StoreUserControlelr::class, 'create'])->name('register')->middleware('auth');
Route::post('/welcome', [StoreUserControlelr::class, 'store'])->name('register')->middleware('auth');

Route::get('admin/dashbod',[AdminController::class,'index'])->name('admin.index')->middleware('auth:admin');
        Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
        Route::post('/admin/login',[AdminController::class,'checklogin'])->name('login.checklogin');
        // Route::get('/admin/register',[AdminController::class,'register'])->name('admin.register');
        // Route::post('/admin/register',[AdminController::class,'checkregister'])->name('register.checkregister');
        Route::get('/logoutAdmin',[AdminController::class,'logoutAdmin'])->name('logoutAdmin');
        Route::post('/admin/questions',[QuestionController::class,'store'])->name('questions');
        
        Route::get('/user/export/excel',[StoreUserControlelr::class,'export'])->name('user.export');
        Route::post('/questions/edit', [StoreUserControlelr::class, 'edit'])->name('questions.edit');
        Route::get('/user-answers/{userId}', [StoreUserControlelr::class,'getUserAnswers']);

        Route::get('/success',[StoreUserControlelr::class,'final'])->middleware('auth')->name('final');
        Route::get('/user/{userId}/answers', [StoreUserControlelr::class,'getUserAnswers']);
        Route::get('/logout',[StoreUserControlelr::class,'logout'])->name('logout');

        Route::get('/delete/question/{id}', [StoreUserControlelr::class, 'deleteQuestion'])->name('delete.question');
        Route::get('/delete/user/{id}', [StoreUserControlelr::class, 'deleteuser'])->name('delete.user');
        Route::get('/thankyou',[StoreUserControlelr::class,'thankyou'])->name('thankyou')->middleware('auth');
require __DIR__.'/auth.php';
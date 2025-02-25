<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\KasirDashboardController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\IsManager;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authentication']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/cari-menu', [KasirDashboardController::class, 'cariMenu']);

Route::middleware('islogin')->group( function () {

    // Route profile
    Route::get('/profile/settings', [ProfileController::class, 'profileIndex'])->name('profile.index');
    Route::post('/profile/settings/update/{id}', [ProfileController::class, 'profileUpdate']);
    Route::get('/profile/change/password', [ProfileController::class, 'changePassIndex'])->name('change.password.index');
    Route::post('/profile/change/password/update', [ProfileController::class, 'changePassUpdate'])->name('change.password.update');
    Route::get('/profile/remove/photo/{id}', [ProfileController::class, 'removePhoto']);

    // Route admin dashboard
    Route::middleware('isadmin')->group( function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'adminIndex'])->name('admin.index');
        Route::get('/admin/dashboard/create', [AdminDashboardController::class, 'adminCreate'])->name('admin.create');
        Route::post('/admin/dashboard/store', [AdminDashboardController::class, 'adminStore'])->name('admin.store');
        Route::get('/admin/dashboard/edit/{id}', [AdminDashboardController::class, 'adminEdit']);
        Route::post('/admin/dashboard/update/{id}', [AdminDashboardController::class, 'adminUpdate']);
        Route::get('/admin/dashboard/delete/{id}', [AdminDashboardController::class, 'adminDelete']);
    });

    // Route manager dashboard
    Route::middleware('isteacher')->group( function () {
        // Menu pages
        Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.index');
    });

});

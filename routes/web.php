<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\AboutAdminController;
use App\Http\Controllers\SkillAdminController;
use App\Http\Controllers\PortfolioAdminController;
use App\Http\Controllers\CertiAdminController;
use App\Http\Controllers\CertificateAdminController;
use App\Http\Controllers\ContactAdminController;
use App\Http\Controllers\ProjectAdminController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/defaultroot', function () {
//     return view('welcome');
// });

Route::get('index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/#contact', [HomeController::class, 'index'])->name('index#contact');

Route::post('/', [HomeController::class, 'store'])->name('index.store');
Route::post('dashboard', [HomeController::class, 'store'])->name('index.store');

Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('admin/index', [AdminController::class, 'dashboard'])->name('admin.index');

// CONTACT START
Route::get('admin/contact/index', [ContactAdminController::class, 'index'])->name('admin.contact.index');

Route::delete('/admin/contact/{id}', [ContactAdminController::class, 'destroy'])->name('admin.contact.destroy');
// CONTACT END

// RESOURCES
Route::resource('/admin/home', HomeAdminController::class);
Route::resource('/admin/about', AboutAdminController::class);
Route::resource('/admin/skill', SkillAdminController::class);
Route::resource('/admin/portfolio', PortfolioAdminController::class);
Route::resource('/admin/certificate', CertificateAdminController::class);
Route::resource('/admin/contact', ContactAdminController::class);

require __DIR__ . '/auth.php';

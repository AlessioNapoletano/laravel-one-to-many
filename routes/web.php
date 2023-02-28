<?php

use App\Http\Controllers\admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Guest\AboutMeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController as WelcomeController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/about-me', [AboutMeController::class, 'index'])->prefix('guest')->name('about-me');


Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
   
    Route::get('/projects/trashed', [AdminProjectController::class, 'trashed'])->name('trashed-projects');
    Route::post('/projects/{project}/restore', [AdminProjectController::class, 'restore'])->name('restore-project')->withTrashed();
    Route::post('/restore-all', [AdminProjectController::class, 'restoreAll'])->name('restore-all-projects');
    Route::delete('/projects/{project}/force-delete', [AdminProjectController::class, 'forceDelete'])->name('force-delete-project')->withTrashed();
    Route::resource('projects', AdminProjectController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php


use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\WorkerController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\TextSearchController;
use App\Http\Controllers\Worker\PageWorkerController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

/**
 * Global controller
 */
Route::get('regency/{id}', [GlobalController::class, 'regency']);
Route::get('district/{id}', [GlobalController::class, 'district']);

/**
 * Route redirect
 */
Route::get('redirects', RedirectController::class);
Route::get('dashboard', [RedirectController::class, 'dashboard'])->name('dashboard');

/**
 * Search Welcome 
 */
Route::get('search', [GlobalController::class, 'search'])->middleware(['auth:sanctum', 'verified'])->name('search');

/**
 * Admin
 */
Route::middleware(['auth:sanctum', 'verified', 'admin'])->prefix('admin')->group(function(){
    Route::view('index', 'admin/index')->name('admin');
    # Worker
    Route::prefix('worker')->group(function(){
        Route::get('', [WorkerController::class, 'index'])->name('admin.worker');
        Route::get('{code}/show', [WorkerController::class, 'show'])->name('admin.worker.show');
    });
    #Skill
    Route::prefix('skill')->group(function(){
        Route::get('', [SkillController::class, 'index'])->name('admin.skill');
    });

    #Client
    Route::prefix('client')->group(function(){
        Route::get('', [ClientController::class, 'index'])->name('admin.client');
    });
});

/**
 * Worker
 */
Route::middleware(['auth:sanctum', 'verified', 'worker'])->prefix('worker')->group(function(){
    Route::view('index', 'worker/index')->name('worker');
    # Profile
    Route::get('edit' , [PageWorkerController::class, 'edit'])->name('worker.edit');
    Route::patch('update' , [PageWorkerController::class, 'update'])->name('worker.update');
    Route::get('show' , [PageWorkerController::class, 'show'])->name('worker.show');
    # Skill
    Route::get('skill' , [PageWorkerController::class, 'skill'])->name('worker.skill');
    Route::post('skill/store' , [PageWorkerController::class, 'skill_store'])->name('worker.skill.store');
    Route::get('skill/remove/{id}' , [PageWorkerController::class, 'skill_remove'])->name('worker.skill.remove');
    #Location
    Route::get('location/edit', [PageWorkerController::class, 'location_edit'])->name('worker.location.edit');
    Route::post('location/update', [PageWorkerController::class, 'location_update'])->name('worker.location.update');
    Route::get('location/show', [PageWorkerController::class, 'location_show'])->name('worker.location.show');
});


/**
 * Client
 */
Route::middleware(['auth:sanctum', 'verified', 'client'])->get('/client', function () {
    return view('client/index');
})->name('client');

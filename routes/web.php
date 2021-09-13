<?php


use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\WorkerController;
use App\Http\Controllers\Client\PageClientController;
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
#Untuk dalam
Route::get('regency1/{id}', [GlobalController::class, 'regency1']);
Route::get('district1/{id}', [GlobalController::class, 'district1']);

/**
 * Route redirect
 */
Route::get('redirects', RedirectController::class);
Route::get('dashboard', [RedirectController::class, 'dashboard'])->name('dashboard');

/**
 * Coming soon
 */

 Route::view('coming-soon', 'coming-soon')->name('soon');

/**
 * Search Welcome 
 */
Route::get('search', [GlobalController::class, 'search'])->middleware(['auth:sanctum', 'verified', 'search'])->name('search');

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
    Route::patch('location/update', [PageWorkerController::class, 'location_update'])->name('worker.location.update');
    Route::get('location/show', [PageWorkerController::class, 'location_show'])->name('worker.location.show');
    #Request
    Route::get('request/order', [PageWorkerController::class, 'request_order'])->name('worker.request.order');
    Route::delete('cancel/{invoice}', [PageWorkerController::class, 'cancel_order'])->name('worker.cancel.order');
    Route::get('request/active', [PageWorkerController::class, 'request_active'])->name('worker.request.active');
    Route::patch('deal/{invoice}', [PageWorkerController::class, 'deal_order'])->name('worker.deal.order');
});

/**
 * Client
 */
Route::middleware(['auth:sanctum', 'verified', 'client'])->prefix('client')->group(function(){
    Route::view('index', 'client/index')->name('client');
    
    #Request
    Route::get('request-order/{client}/{worker}/{skill}/'.date('dmydmymd'), [PageClientController::class, 'request'])->name('client.request');
    Route::post('order', [PageClientController::class, 'order'])->name('client.order');
    Route::get('invoice/history', [PageClientController::class, 'history'])->name('client.invoice.history');
    Route::get('invoice/{invoice}', [PageClientController::class, 'invoice'])->name('client.invoice');
    
});

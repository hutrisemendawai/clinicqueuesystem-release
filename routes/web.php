<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\HomeController;
 
Route::get('/', function () {
    return view('welcome');
});
 
Auth::routes();
   
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
   
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/create-queue', [QueueController::class, 'createForm'])->middleware('auth')->name('queues.create');
    Route::post('/queues', [QueueController::class, 'create'])->middleware('auth')->name('queues.store');
    Route::delete('/queues/{queue}', [QueueController::class, 'destroy'])->middleware('auth')->name('queues.destroy');
});

   
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
   
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
Route::delete('/queues/{queue}/admin', [QueueController::class, 'destroyForAdmin'])->middleware('auth')->name('queues.destroyForAdmin');
   
//Admin Routes List
Route::middleware(['auth', 'user-access:manager'])->group(function () {
   
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
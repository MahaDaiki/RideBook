<?php

use App\Http\Controllers\AdminController;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });
    Route::delete('/soft-delete-user/{id}', [AdminController::class, 'softDeleteUserAndRelated'])
    ->name('soft.delete.user'); 


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
 
});
Route::get('/driver-details/{id}', [RegisteredUserController::class, 'showForm']);
    Route::post('/driver-details', [RegisteredUserController::class, 'storeDetails'])->name('driverstore');
    
//    Route::get('/register', [RegisteredUserController::class, 'role']);    


require __DIR__.'/auth.php';

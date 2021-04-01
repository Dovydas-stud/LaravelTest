<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/crud', function () {
//     return view('crud');
// })->name('crud');

Route::resource('crud', CrudController::class);

// Route::get('/crud', [CrudController::class, 'index'])->name('crud');
// Route::get('/crud/create', [CrudController::class, 'create'])->name('crud_create');
// Route::post('/crud', [CrudController::class, 'store'])->name('crud_store');
// Route::get('/crud/{id}/edit', [CrudController::class, 'edit'])->name('crud_edit');
// Route::put('/crud', [CrudController::class , 'update'])->name('crud_update');
// Route::get('/crud/{id}/delete', [CrudController::class, 'destroy'])->name('crud_destroy');

require __DIR__.'/auth.php';

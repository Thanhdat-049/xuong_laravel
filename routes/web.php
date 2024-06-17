<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CatelogueController;
use App\Http\Controllers\admin\ProductController;

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
Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        });
        Route::prefix('catelogue')
            ->as('catelogue.')
            ->group(function () {
                Route::get('/',                 [CatelogueController::class, 'index'])->name('index');
                Route::get('create',            [CatelogueController::class, 'create'])->name('create');
                Route::post('store',            [CatelogueController::class, 'store'])->name('store');
                Route::get('show/{id}',         [CatelogueController::class, 'show'])->name('show');
                Route::get('{id}/edit',         [CatelogueController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [CatelogueController::class, 'update'])->name('update');
                Route::get('{id}/destroy',   [CatelogueController::class, 'destroy'])->name('destroy');
            });

    Route:: resource('products', ProductController::class);

    });


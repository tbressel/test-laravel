<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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
    return view('home');
})->name('home');

Route::get('/tasklist/', [TaskController::class, 'index'])->name('task.list');

Route::get('/taskadd/', [TaskController::class, 'create'])->name('task.add');

Route::post('/taskcreated/', [TaskController::class, 'store'])->name('task.created');

Route::get('/taskedit/{id}', [TaskController::class, 'edit'])->where('id','[0-9]+')->name('task.edit');

Route::post('/taskupdate/{id}', [TaskController::class, 'update'])->where('id','[0-9]+')->name('task.update');

Route::get('/taskdelete/{id}', [TaskController::class, 'destroy'])->where('id','[0-9]+')->name('task.delete');

Route::get('/taskdone/{id}', [TaskController::class, 'done'])->where('id','[0-9]+')->name('task.done');

Route::get('/taskundone/{id}', [TaskController::class, 'undone'])->where('id','[0-9]+')->name('task.undone');
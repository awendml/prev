<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrevController;
use Illuminate\Http\Client\Request;
use App\Models\Employee;

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

// CRUD Employee
Route::get('/employee',[PrevController::class,'index']);
Route::get('/employee/search',[PrevController::class,'search']);
Route::get('/employee/add',[PrevController::class,'add']);
Route::post('/employee/store',[PrevController::class,'store']);
Route::get('/employee/edit/{id}',[PrevController::class,'edit']);
Route::put('/employee/update/{id}',[PrevController::class,'update']);
Route::get('/employee/delete/{id}',[PrevController::class,'delete']);
Route::get('/employee/trash',[PrevController::class,'trash']);

// CRUD Position
Route::get('/position',[PrevController::class,'position']);
Route::get('/position/add',[PrevController::class,'addPosition']);
Route::post('/position/store',[PrevController::class,'storePosition']);
Route::get('/position/edit/{id}',[PrevController::class,'editPosition']);
Route::put('/position/update/{id}',[PrevController::class,'updatePosition']);
Route::get('/position/delete/{id}',[PrevController::class,'deletePosition']);
Route::get('/position/trash',[PrevController::class,'trashPosition']);


// Soft deletes routes
Route::get('/employee/restore/{id}',[PrevController::class,'restore']);
Route::get('/employee/delete_permanent/{id}',[PrevController::class,'deletePermanent']);
Route::get('/employee/restore_all',[PrevController::class,'restoreAll']);
Route::get('/employee/delete_permanent_all',[PrevController::class,'depall']);


// ckEditor
Route::get('/employee/ckeditor',[PrevController::class,'ckeditor']);
Route::get('/employee/ckeditor/image',[PrevController::class,'image'])->name('upload');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

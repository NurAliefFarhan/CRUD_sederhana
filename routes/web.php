<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PegawaiController::class, 'home'])->name('home');
Route::post('/', [PegawaiController::class, 'inputData'])->name('data.post'); 
Route::delete('/delete/{id}', [PegawaiController::class, 'destroy'])->name('delete'); //route untuk btn delete todo index 
Route::get('/edit/{id}', [PegawaiController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [PegawaiController::class, 'update'])->name('update');




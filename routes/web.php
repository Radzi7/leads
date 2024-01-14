<?php

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
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::view('/', 'home.index')->name('home');
Route::redirect('/home', '/')->name('home.redirect');

Route::get('leads', [\App\Http\Controllers\LeadController::class, 'index'])->name('leads');
Route::get('leads/create', [\App\Http\Controllers\LeadController::class, 'create'])->name('leads.create');
Route::post('leads', [\App\Http\Controllers\LeadController::class, 'store'])->name('leads.store');
Route::get('leads/{lead}', [\App\Http\Controllers\LeadController::class, 'show'])->name('leads.show')->whereNumber('lead');

Route::get('leads/{lead}/edit', [\App\Http\Controllers\LeadController::class, 'edit'])->name('leads.edit')->whereNumber('lead');
Route::put('leads/{lead}', [\App\Http\Controllers\LeadController::class, 'update'])->name('leads.update')->whereNumber('lead');

Route::delete('leads/{lead}', [\App\Http\Controllers\LeadController::class, 'delete'])->name('leads.delete')->whereNumber('lead');

Route::get('take/{lead}/edit', [\App\Http\Controllers\LeadController::class, 'takeEdit'])->name('take.edit')->whereNumber('lead');
Route::put('take/{lead}', [\App\Http\Controllers\LeadController::class, 'takeUpdate'])->name('take.update')->whereNumber('lead');

Route::get('column/{lead}/edit', [\App\Http\Controllers\LeadController::class, 'columnEdit'])->name('column.edit')->whereNumber('lead');
Route::put('column/{lead}', [\App\Http\Controllers\LeadController::class, 'columnUpdate'])->name('column.update')->whereNumber('lead');

Route::get('comment/{lead}/edit', [\App\Http\Controllers\LeadController::class, 'commentEdit'])->name('comment.edit')->whereNumber('lead');
Route::put('comment/{lead}', [\App\Http\Controllers\LeadController::class, 'commentUpdate'])->name('comment.update')->whereNumber('lead');

Route::get('histories', [\App\Http\Controllers\HistoryController::class, 'index'])->name('histories');
Route::get('histories/{history}', [\App\Http\Controllers\HistoryController::class, 'show'])->name('histories.show')->whereNumber('history');

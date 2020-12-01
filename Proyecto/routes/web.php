<?php

use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard', function () {
        if (Auth::user()->empleado) {
            return view('employee');
        } else {
            return view('dashboard');
        }
    })->name('dashboard');
    Route::get('/empleado/nuevo','NewEmployee@create')->name('nempleado');
    Route::post('/empleado/nuevo','NewEmployee@store')->name('sempleado');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/historial', function () {
    return view('pedido.historial');
})->name('historial');

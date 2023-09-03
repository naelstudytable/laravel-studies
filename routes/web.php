<?php

use App\Livewire\ListAndRegisterUsers;
use App\Livewire\RegisterForm;
use App\Livewire\Todo\Todo;
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

Route::prefix('todo')->group(function () {
    Route::get('/', Todo::class)->name('todo.index');
});

Route::get('/register-form', RegisterForm::class)->name('registerForm');
Route::get('/list-and-register-users', ListAndRegisterUsers::class)->name('listAndRegisterUsers');

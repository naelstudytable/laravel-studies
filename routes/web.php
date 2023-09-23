<?php

use App\Livewire\Clicker;
use App\Livewire\ContactUs;
use App\Livewire\HomePage;
use App\Livewire\ListAndRegisterUsers;
use App\Livewire\RegisterForm;
use App\Livewire\TestSimplePage;
use App\Livewire\Todo\Todo;
use App\Livewire\UserPage;
use App\Livewire\UsersList;
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

Route::get('/clicker', Clicker::class)->name('clicker');
Route::get('/register-form', RegisterForm::class)->name('registerForm');
Route::get('/users-list/{search?}', UsersList::class)->name('usersList');
Route::get('/list-and-register-users', ListAndRegisterUsers::class)->name('listAndRegisterUsers');
Route::get('/home-page', HomePage::class)->name('homePage');
Route::get('/user-page/{user?}', UserPage::class)->name('userPage');
Route::get('/test-simple-page/{user}', TestSimplePage::class)->name('testSimplePage');
Route::get('/contact-us', ContactUs::class)->name('contactUs');

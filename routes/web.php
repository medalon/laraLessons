<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Settings\AccountController;
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


// Route::middleware('auth')->group(function () {
//     Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

//     Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

//     Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

//     Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');

//     Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');

//     Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

//     Route::get('/contacts/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');

// });

// Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index')->middleware('auth');

// Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

// Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show'); // custom key for route model binding -> {contact:first_name} 

// Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');

// Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

// Route::get('/contacts/edit/{contact}', [ContactController::class, 'edit'])->name('contacts.edit');

// Route::resource('/contacts', ContactController::class);
Route::resources([
    '/contacts' => ContactController::class,
    '/companies'  => CompanyController::class,
]);


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/settings/account', [AccountController::class, 'index']);

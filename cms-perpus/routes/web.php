<?php

use App\Exports\BookExport;
use App\Http\Controllers\CategoryController;
use App\Models\Book;
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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('book', 'livewire/pages/book/index')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('book');

Route::view('user', 'livewire/pages/user/index')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('user');

Route::view('book/create', 'livewire/pages/book/create')
    ->middleware(['auth', 'verified'])
    ->name('book.create');

Route::get('/book/{book}', function (Book $book) {
    return view('livewire/pages/book/book', [
        'book' => $book
    ]);
})->middleware(['auth', 'verified'])->name('book.detail');

Route::get('/book/{book}/edit', function (Book $book) {
    return view('livewire/pages/book/edit', [
        'book' => $book
    ]);
})->middleware(['auth', 'verified']);

Route::get('/download-book', function () {
    return new BookExport();
})->middleware(['auth', 'verified', 'admin']);

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('category', 'livewire.pages.category.index')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('category.index');;


require __DIR__ . '/auth.php';

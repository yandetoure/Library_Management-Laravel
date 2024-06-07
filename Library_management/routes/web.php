<?php
use App\http\Controllers\AutorController;
use App\http\Controllers\BookController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route group pour Books
Route::prefix('books')->name('books.')->group(function () {
    Route::get('/show', [BookController::class, 'show'])->name('show');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('/', [BookController::class, 'store'])->name('store');
    Route::get('/{categorie}/edit', [BookController::class, 'edit'])->name('edit');
    Route::put('/{categorie}', [BookController::class, 'update'])->name('update');
    Route::delete('/{categorie}', [BookController::class, 'destroy'])->name('destroy');
});

// Route group pour Autors
Route::prefix('autors')->name('autors.')->group(function () {
    Route::get('/show', [AutorController::class, 'index'])->name('show');
    Route::get('/create', [AutorController::class, 'create'])->name('create');
    Route::post('/', [AutorController::class, 'store'])->name('store');
    Route::get('/{categorie}/edit', [AutorController::class, 'edit'])->name('edit');
    Route::put('/{categorie}', [AutorController::class, 'update'])->name('update');
    Route::delete('/{categorie}', [AutorController::class, 'destroy'])->name('destroy');
});

// Route group pour Catégories
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/show', [CategorieController::class, 'index'])->name('show');
    Route::get('/create', [CategorieController::class, 'create'])->name('create');
    Route::post('/', [CategorieController::class, 'store'])->name('store');
    Route::get('/{categorie}/edit', [CategorieController::class, 'edit'])->name('edit');
    Route::put('/{categorie}', [CategorieController::class, 'update'])->name('update');
    Route::delete('/{categorie}', [CategorieController::class, 'destroy'])->name('destroy');
});

// Route group pour Publisher
Route::prefix('publishers')->name('publishers.')->group(function () {
    Route::get('/show', [PublisherController::class, 'index'])->name('show');
    Route::get('/create', [PublisherController::class, 'create'])->name('create');
    Route::post('/', [PublisherController::class, 'store'])->name('store');
    Route::get('/{categorie}/edit', [PublisherController::class, 'edit'])->name('edit');
    Route::put('/{categorie}', [PublisherController::class, 'update'])->name('update');
    Route::delete('/{categorie}', [PublisherController::class, 'destroy'])->name('destroy');
});


<?php

use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\ShowProducts;
use App\Http\Livewire\Admin\ShowCategories;
use App\Http\Livewire\Admin\CreateCategories;
use App\Http\Livewire\Admin\EditCategories;

Route::get('/', ShowProducts::class)->name('admin.products.index');
Route::get('/categories', ShowCategories::class)->name('admin.categories.index');
Route::get('categories/create', CreateCategories::class)->name('admin.categories.create');
Route::get('editcategories/{category}', EditCategories::class)->name('admin.categories.edit');
Route::post('categories/import', [CategoryController::class, 'store'])->name('admin.categories.excel');
Route::get('categories/export', [CategoryController::class, 'exportCategories'])->name('admin.exportcategories.excel');
Route::get('categories/pdf', [CategoryController::class, 'pdf'])->name('admin.categories.pdf');
Route::get('categories/ventapdf', [CategoryController::class, 'ventapdf'])->name('admin.categories.ventapdf');

//para generar slug masivo, inhabilitar lugo de generdo el slug
Route::get('categories/slug', [CategoryController::class, 'generateslug'])->name('admin.categories.generateslug');



/* Route::get('categories/{category}', ShowCategories::class)->name('admin.categories.update'); */

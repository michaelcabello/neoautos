<?php

use App\Models\User;
use App\Http\Livewire\EditProducts;
use App\Http\Livewire\EditProductsd;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\CreateProducts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\SliderclienteController;

Route::get('/', HomeController::class)->name('home');
//HomeController no necesita poner un metodo porque tiene al unico metodo llamado __invoque

Route::get('categorias', [CategoryController ::class, 'show'])->name('showcategories');
//Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('categorias/{category}', [CategoryController::class, 'showepc'])->name('showepc');
Route::get('empresa/{busine}', [CategoryController::class, 'showempresa'])->name('showempresa');
Route::get('empresaa/{busine}', [CategoryController::class, 'inicioempresa'])->name('inicioempresa');

Route::get('nosotrosempresa/{busine}', [CategoryController::class, 'aboutempresa'])->name('aboutempresa');
Route::get('contactoempresa/{busine}', [CategoryController::class, 'contactempresa'])->name('contactempresa');
Route::post('contactoempresa/{busine}', [CategoryController::class, 'contactempresastore'])->name('contactempresastore');

Route::get('productos', [ProductController::class, 'list'])->name('listproducts');
Route::get('productosnuevos/{item}', [ProductController::class, 'listnuevos'])->name('listproductsnuevos');
Route::get('productosusados/{item}', [ProductController::class, 'listusados'])->name('listproductsusados');

Route::get('producto/{product}', [ProductController::class, 'verproducto'])->name('verproducto');
Route::get('empresas', [BusinessController::class, 'list'])->name('listbusiness');



/* Route::get('/auth/redirect', function () {
    return Socialite::driver('facebook')->redirect();
}); */


Route::get('login/facebook/redirect', [FacebookController::class, 'redirect'])->name('redirectfacebook');
Route::get('login/facebook/callback', [FacebookController::class, 'callback'])->name('callbackfacebook');

Route::get('login/google/redirect', [GoogleController::class, 'redirect'])->name('redirectgoogle');
Route::get('login/google/callback', [GoogleController::class, 'callback'])->name('callbackgoogle');


Route::get('privacy-policy', [FacebookController::class, 'facebookpp'])->name('facebookpp');
Route::get('terms-of-service', [FacebookController::class, 'facebooktos'])->name('facebooktos');



Route::group([
    'prefix' =>'user',
    'middleware' => 'auth'],
function(){
/* Route::prefix("user")->group(function(){ */
    Route::get('misproductos', [CategoryController::class, 'showproductos'])->name('showproductos');
    Route::get('mispedidos', [CategoryController::class, 'showpedidos'])->name('showpedidos');
    Route::get('miempresa', [CategoryController::class, 'miempresa'])->name('miempresa');
    Route::get('miscategorias', [CategoryController::class, 'miscategorias'])->name('miscategorias');
    //Route::get('miscategorias/{user}', [CategoryController::class, 'edit'])->name('miscategoriasa');
    Route::get('miscategoriasa', [CategoryController::class, 'edit'])->name('miscategoriasa');
    /* Route::get('miscategoriasd/{user}', [CategoryController::class, 'editd'])->name('miscategoriasd'); */
    Route::put('miempresa/{user}', [CategoryController::class, 'update'])->name('miscategoriasupdate');
    //Route::put('miempresa', [CategoryController::class, 'update'])->name('miscategoriasupdate');
    /* Route::put('miempresad/{user}', [CategoryController::class, 'updated'])->name('miscategoriasupdated'); */
     Route::get('misproductos/create', CreateProducts::class)->name('products.create');
    // Route::get('misproductos/edit', CreateProducts::class)->name('products.create');
    Route::get('editproducts/{product}', EditProducts::class)->name('products.edit');
    Route::get('editproductsd/{product}', EditProductsd::class)->name('products.editd');
    /*Route::post('products/{product}/photos', 'PhotoController@store')->name('products.photos.store'); */
    Route::post('products/{product}/photos', [PhotoController::class, 'store'])->name('products.photos.store');
    Route::delete('products/{photo}', [PhotoController::class, 'destroy'])->name('products.photos.destroy');
    Route::get('milogo/{empresa}', [PhotoController::class, 'edit'])->name('miempresa.logo.edit');
    Route::put('milogo/{empresa}', [PhotoController::class, 'update'])->name('miempresa.logo.update');

    Route::resource('sliderclientes', SliderclienteController::class);

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\ContratistasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;

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

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



// Rutas de lista
Route::get('/add-to-list/{materialId}', [HomeController::class, 'addToTempList'])->name('add-to-list');
Route::get('/view-temp-list',  [HomeController::class, 'viewTempList'])->name('view-temp-list');
Route::delete('/remove-from-list/{materialId}',  [HomeController::class, 'removeFromTempList'])->name('remove-from-list');
Route::delete('/clear-temp-list',  [HomeController::class, 'clearTempList'])->name('clear-temp-list');

// Rutas de cotizacion
Route::post('/solicitar', [CotizacionController::class, 'solicitarCotizacion'])->name('solicitarcotizacion');

// Rutas protegidas con autenticación y rol "admin"
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Materiales 
    Route::get('/materiales', [MaterialesController::class, 'index'])->name('materiales.index');
    Route::get('/materiales/create', [MaterialesController::class, 'create'])->name('materiales.create');
    Route::post('/materiales', [MaterialesController::class, 'store'])->name('materiales.store');
    Route::get('/materiales/{material}', [MaterialesController::class, 'show'])->name('materiales.show');
    Route::get('/materiales/{material}/edit', [MaterialesController::class, 'edit'])->name('materiales.edit');
    Route::put('/materiales/{material}', [MaterialesController::class, 'update'])->name('materiales.update');
    Route::delete('/materiales/{material}', [MaterialesController::class, 'destroy'])->name('materiales.destroy');

    // Empresas
    Route::get('empresas', [EmpresasController::class, 'index'])->name('empresas.index');
    Route::get('empresas/create', [EmpresasController::class, 'create'])->name('empresas.create');
    Route::post('empresas', [EmpresasController::class, 'store'])->name('empresas.store');
    Route::get('empresas/{empresa}', [EmpresasController::class, 'show'])->name('empresas.show');
    Route::get('empresas/{empresa}/edit', [EmpresasController::class, 'edit'])->name('empresas.edit');
    Route::put('empresas/{empresa}', [EmpresasController::class, 'update'])->name('empresas.update');
    Route::delete('empresas/{empresa}', [EmpresasController::class, 'destroy'])->name('empresas.destroy');

    // Contratistas
    Route::get('contratistas', [ContratistasController::class, 'index'])->name('contratistas.index');
    Route::get('contratistas/create', [ContratistasController::class, 'create'])->name('contratistas.create');
    Route::post('contratistas', [ContratistasController::class, 'store'])->name('contratistas.store');
    Route::get('contratistas/{contratista}', [ContratistasController::class, 'show'])->name('contratistas.show');
    Route::get('contratistas/{contratista}/edit', [ContratistasController::class, 'edit'])->name('contratistas.edit');
    Route::put('contratistas/{contratista}', [ContratistasController::class, 'update'])->name('contratistas.update');

    // Categorias de Materiales
    Route::get('categorias', [CategoriasController::class, 'index'])->name('categorias.index');
    Route::get('categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::post('categorias', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::get('categorias/{categoria}', [CategoriasController::class, 'show'])->name('categorias.show');
    Route::get('categorias/{categoria}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');
    Route::put('categorias/{categoria}', [CategoriasController::class, 'update'])->name('categorias.update');
    Route::delete('categorias/{categoria}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\IndexController::class, 'index'])->name('dashboard');


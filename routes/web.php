<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('clientes', ClienteController::class);
    // Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // Route::resource('users', UserController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/tester', function () {
    return view('tester');
});

Route::resource('tests', TestController::class);
// Route::get('productos', function () {
//     return redirect('productos/index');
// });
// Route::resource('productos', ProductoController::class);
// Route::get('/categoria/index', [CategoriaController::class, 'index'])->name('categoria.index');

// Route::get('/compra/index', [CompraController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/compra/index', [CompraController::class, 'index'])->name('compra.index');
    Route::get('/producto/index', [ProductoController::class, 'index'])->name('producto.index');
    Route::get('/proveedor/index', [ProveedorController::class, 'index'])->name('proveedor.index');
    Route::get('/subcategoria/index', [SubCategoriaController::class, 'index'])->name('subcategoria.index');
    Route::resource('/clientes', ClienteController::class);
    // Route::get('/cliente', [ClienteController::class, 'test'])->name('clientes.test');
});

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\Admin\Rol\RolesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetalleEntradaController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\SubCategoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group([
    // 'middleware' => 'api',
    'prefix' => 'auth',
    // 'middleware' => ['role:admin'],
    // 'middleware' => ['auth:api','role:admin'],
    //  'middleware' => ['api','role:admin'],
    // 'middleware' => ['api','role:admin'],
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->name('me');
    Route::post('/list', [AuthController::class, 'list']);
    Route::post('/reg', [AuthController::class, 'reg'])->name('reg');
});

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::resource("roles", RolesController::class);
});

Route::group([
    'prefix' => 'categorias',
    'middleware' => 'api',
], function ($router) {
    Route::get('/getall', [CategoriaController::class, 'index']);
    Route::get('/getdata/{cat_id}', [CategoriaController::class, 'show']);
    Route::post('/savedata', [CategoriaController::class, 'store']);
    Route::put('/updatedata/{cat_id}', [CategoriaController::class, 'update']);
    Route::delete('/deletedata/{cat_id}', [CategoriaController::class, 'destroy']);
    Route::delete('/statedata/{cat_id}', [CategoriaController::class, 'updatestate']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'subcategorias',
], function ($router) {
    Route::get('/getall', [SubCategoriaController::class, 'index']);
    Route::get('/getdata/{sbc_id}', [SubCategoriaController::class, 'show']);
    Route::post('/savedata', [SubCategoriaController::class, 'store']);
    Route::put('/updatedata/{sbc_id}', [SubCategoriaController::class, 'update']);
    Route::delete('/deletedata/{sbc_id}', [SubCategoriaController::class, 'destroy']);
    Route::get('/statedatacat/{cat_id}', [SubCategoriaController::class, 'subcategoriasByCategoria']);
});

Route::group([
    'prefix' => 'productos',
    'middleware' => 'api',
], function ($router) {
    Route::get('/getall', [ProductoController::class, 'index']);
    Route::get('/getdata/{id_pro}', [ProductoController::class, 'show']);
    Route::get('/getProducto/{buscar_texto}', [ProductoController::class, 'buscar']);
    Route::post('/savedata', [ProductoController::class, 'store']);
    Route::put('/updatedata/{id_pro}', [ProductoController::class, 'update']);
    Route::delete('/deletedata/{id_pro}', [ProductoController::class, 'destroy']);
    Route::get('/statedatacat/{sbc_id}', [ProductoController::class, 'productosBySubCategoria']);
});

Route::group([
    'prefix' => 'personas',
    'middleware' => 'api',
], function ($router) {
    Route::get('/getall', [PersonaController::class, 'index']);
    Route::get('/getdata/{id}', [PersonaController::class, 'show']);
    Route::get('/getPersona/{buscar_texto}', [PersonaController::class, 'buscar']);
    Route::post('/savedata', [PersonaController::class, 'store']);
    Route::put('/updatedata/{id}', [PersonaController::class, 'update']);
    Route::delete('/deletedata/{id}', [PersonaController::class, 'destroy']);
    Route::delete('/statedata/{id}', [PersonaController::class, 'updatestate']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'proveedores',
], function ($router) {
    Route::get('/getall', [ProveedorController::class, 'index']);
    Route::get('/getdata/{id_prov}', [ProveedorController::class, 'show']);
    Route::post('/savedata', [ProveedorController::class, 'store']);
    Route::put('/updatedata/{id_prov}', [ProveedorController::class, 'update']);
    Route::delete('/deletedata/{id_prov}', [ProveedorController::class, 'destroy']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'entrada',
], function ($router) {
    Route::get('/getall', [EntradaController::class, 'index']);
    Route::get('/getdata/{ent_id}', [EntradaController::class, 'show']);
    Route::post('/savedata', [EntradaController::class, 'store']);
    Route::put('/updatedata/{ent_id}', [EntradaController::class, 'update']);
    Route::delete('/deletedata/{ent_id}', [EntradaController::class, 'destroy']);
    Route::get('/kardex', [EntradaController::class, 'GetVistaEntrada']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'entradadetalle',
], function ($router) {
    Route::get('/getall', [DetalleEntradaController::class, 'index']);
    Route::get('/getdata/{dte_id}', [DetalleEntradaController::class, 'show']);
    Route::post('/savedata', [DetalleEntradaController::class, 'store']);
    Route::put('/updatedata/{dte_id}', [DetalleEntradaController::class, 'update']);
    Route::delete('/deletedata/{dte_id}', [DetalleEntradaController::class, 'destroy']);
});


Route::any('{any}', function () {
    return response()->json([
        'status' => 'error',
        'message' => 'Resource not found'
    ], 404);
})->where('any', '.*');

// Route::group([
//     // 'middleware' => 'api',
//     'prefix' => 'auth',
//     // 'middleware' => ['role:Super-Admin'],
//     'middleware' => ['auth:api','role:Super-Admin'],
// ], function ($router) {
//     Route::post('/register', [AuthController::class, 'register'])->name('register');
//     Route::post('/login', [AuthController::class, 'login'])->middleware('auth:api')->name('login');
//     Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
//     Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
//     Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
// });

// Route::group([
//     'prefix' => 'auth',
//     'middleware' => ['api' ,\Spatie\Permission\Middleware\RoleMiddleware::using('Super-Admin')],
// ], 
// function () { 
//     Route::post('/register', [AuthController::class, 'register'])->name('register');
//     Route::post('/login', [AuthController::class, 'login'])->name('login');
//     Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
//     Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
//     Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
// });

// Route::group(
//     ['middleware' => ['role:Super-Admin']],
//      function () {
//        Route::get('/api/roles', function() {
//          return App\Role::get();
//      });
//         Route::get('/api/permissions', function() {
//             return App\Permission::get();
//         });
//     }
// );

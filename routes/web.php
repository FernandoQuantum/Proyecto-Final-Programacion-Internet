<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {

    $user = Auth::user();
    $productos = Producto::all();
    return view('pagina_principal', compact('user', 'productos'));
});


Route::resource('producto', ProductoController::class);
Route::resource('compra', CompraController::class);

Route::post('/compra/make/{producto_id}', [CompraController::class, 'makeCompra']);
Route::get('/usuario/{user_id}', [UserController::class, 'info']);
Route::get('/status-edit/{compra_id}', [CompraController::class, 'cambiarStatus']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

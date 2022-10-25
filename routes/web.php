<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
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

Route::get('/menu', function () {
    return view('index');
});

Route::get('/', function () {

    $user = Auth::user();
    return view('pagina_principal', compact('user'));
});

// Route::post('/recepcion-validacion', [ShopController::class, 'recibe_form']);

// Route::get('/contacto/{codigo?}', [ShopController::class, 'contacto']);

Route::resource('cliente', ClientController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

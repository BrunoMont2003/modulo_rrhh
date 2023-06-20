<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\PlazaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuestoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/colaboradores', ColaboradorController::class);
    Route::resource('/candidatos', CandidatoController::class);
    Route::resource('/plazas', PlazaController::class);
    Route::resource('/puestos', PuestoController::class);
    Route::resource('/equipos', EquipoController::class);
    Route::resource('/horarios', HorarioController::class);
    Route::resource('/nomina', NominaController::class);
});

require __DIR__ . '/auth.php';

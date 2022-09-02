<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EscuelaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ConstrasenaController;

use Illuminate\Database\Eloquent\SoftDeletes;

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

Route::get('/', function () {
   return view('auth.login');
 
});



Route::resource('usuario',UsuarioController::class);
Route::resource('escuelas',EscuelaController::class);
Route::resource('estudiantes',EstudianteController::class);
Route::resource('imagenes',ImagenController::class);
Route::resource('contrasena',ConstrasenaController::class);

Auth::routes();



   
Route::group(['middleware' =>'auth'], function (){

  Route::get('/', [EstudianteController::class, 'index'])->name('home');
  Route::get('/home', [EstudianteController::class, 'index'])->name('home');
  Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios');
  Route::get('/escuelas', [EscuelaController::class, 'index'])->name('escuelas');
  Route::post('import', [EstudianteController::class, 'store'])->name('import');
  Route::get('/imagenes', [ImagenController::class, 'index'])->name('imagenes');
  Route::get('/contrasenas', [ConstrasenaController::class, 'index'])->name('contrasenas');
  
  

  

});


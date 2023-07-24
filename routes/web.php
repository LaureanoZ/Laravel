<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');


// login
Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'formLogin'])
    ->name('auth.formLogin');
Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'processLogin'])
    ->name('auth.processLogin');
Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'processLogout'])
    ->name('auth.processLogout');

// services
Route::get('servicios/paginas', [\App\Http\Controllers\ServicesController::class, 'index'])
    ->name('services.index');

Route::get('servicios/nuevo', [\App\Http\Controllers\ServicesController::class, 'formNew'])
    ->name('services.new')
    ->middleware('auth');
Route::post('servicios/nuevo', [\App\Http\Controllers\ServicesController::class, 'processNew'])
    ->name('services.processNew')
    ->middleware('auth');

Route::get('servicios/{id}', [\App\Http\Controllers\ServicesController::class, 'view'])
    ->name('services.view')
    ->middleware(['isAdult']);

Route::get('peliculas/{id}/confirmar-edad', [\App\Http\Controllers\AdultVerificationController::class, 'formConfirmation'])
    ->name('adult-verification.formConfirmation');
Route::post('peliculas/{id}/confirmar-edad', [\App\Http\Controllers\AdultVerificationController::class, 'processConfirmation'])
    ->name('adult-verification.processConfirmation');

Route::get('servicios/{id}/editar', [\App\Http\Controllers\ServicesController::class, 'formUpdate'])
    ->name('services.formUpdate')
    ->middleware('auth');
Route::post('servicios/{id}/editar', [\App\Http\Controllers\ServicesController::class, 'processUpdate'])
    ->name('services.processUpdate')
    ->middleware('auth');

Route::get('servicios/{id}/eliminar', [\App\Http\Controllers\ServicesController::class, 'confirmDelete'])
    ->name('services.confirmDelete')
    ->middleware('auth');
Route::post('servicios/{id}/eliminar', [\App\Http\Controllers\ServicesController::class, 'processDelete'])
    ->name('services.processDelete')
    ->middleware('auth');

// Blogs
Route::get('blogs/paginas', [\App\Http\Controllers\BlogsController::class, 'index'])
    ->name('blogs.index');

    
Route::get('blogs/nuevo', [\App\Http\Controllers\BlogsController::class, 'formNew'])
    ->name('blogs.new')
    ->middleware('auth');
    
Route::post('blogs/nuevo', [\App\Http\Controllers\BlogsController::class, 'processNew'])
    ->name('blogs.processNew')
    ->middleware('auth');
Route::get('blogs/{id}', [\App\Http\Controllers\BlogsController::class, 'view'])
        ->name('blogs.view');

Route::get('blogs/{id}/editar', [\App\Http\Controllers\BlogsController::class, 'formUpdate'])
    ->name('blogs.formUpdate')
    ->middleware('auth');

Route::post('blogs/{id}/editar', [\App\Http\Controllers\BlogsController::class, 'processUpdate'])
    ->name('blogs.processUpdate')
    ->middleware('auth');

Route::get('blogs/{id}/eliminar', [\App\Http\Controllers\BlogsController::class, 'confirmDelete'])
    ->name('blogs.confirmDelete')
    ->middleware('auth');

Route::post('blogs/{id}/eliminar', [\App\Http\Controllers\BlogsController::class, 'processDelete'])
    ->name('blogs.processDelete')
    ->middleware('auth');

// admin
Route::get('admin', [\App\Http\Controllers\AdminController::class, 'admin'])
    ->name('admin.servicesDashboard')
    ->middleware('auth')
    ->middleware('isAdmin');
Route::get('admin/blog', [\App\Http\Controllers\AdminController::class, 'adminBlog'])
    ->name('admin.blogsDashboard')
    ->middleware('auth')
    ->middleware('isAdmin');
Route::get('admin/user', [\App\Http\Controllers\AdminController::class, 'adminUser'])
    ->name('admin.usersDashboard')
    ->middleware('auth')
    ->middleware('isAdmin');
Route::get('admin/user/{id}', [\App\Http\Controllers\AdminController::class, 'view'])
    ->name('admin.userDetail')
    ->middleware('auth')
    ->middleware('isAdmin');

// Mercado Pago

Route::get('mp/pago-mp/{id}', [\App\Http\Controllers\MercadoPagoController::class, 'showMP'])
    ->name('mp.paymp');

Route::get('mp/success', [\App\Http\Controllers\MercadoPagoController::class, 'processSuccess'])
    ->name('mp.success');
Route::get('mp/pending', [\App\Http\Controllers\MercadoPagoController::class, 'processPending'])
    ->name('mp.pending');
Route::get('mp/failure', [\App\Http\Controllers\MercadoPagoController::class, 'processFailure'])
    ->name('mp.failure');
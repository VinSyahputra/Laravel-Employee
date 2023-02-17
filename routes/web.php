<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeController;
use App\Models\Employe;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/companies', CompanyController::class)->middleware('auth');
Route::resource('/employees', EmployeController::class)->middleware('auth');

Route::get('/companies/{company}/export', [CompanyController::class, 'export'])->middleware('auth');
Route::get('/getcompany', [CompanyController::class, 'getCompanyData'])->middleware('auth');

Route::post('/employees/import', [EmployeController::class, 'import'])->middleware('auth');

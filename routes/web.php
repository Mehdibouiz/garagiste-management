<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\ReparationsController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AppointementController;

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
})->name('home');

Route::get('/dashboard', [AuthManager::class, 'dashboard'])->name('dashboard');
Route::get('/gestion-voiture', [CarController::class, 'gestionVoiture'])->name('gestionVoiture')->middleware('auth');
Route::get('/gestion-clients', [ClientsController::class, 'gestionClients'])->name('gestionClients')->middleware('auth');
Route::delete('/cars/{id}', [CarController::class, 'deleteCar'])->name('cars.delete')->middleware('auth');
Route::put('/cars/{id}', [CarController::class, 'updateCar'])->name('cars.update')->middleware('auth');
Route::get('/gestion-charts', [ChartsController::class, 'gestionCharts'])->name('gestionCharts')->middleware('auth');
Route::get('/gestion-Reparations', [ReparationsController::class, 'gestionReparations'])->name('gestionReparations')->middleware('auth');
Route::get('/gestion-Invoice', [InvoiceController::class, 'gestionInvoice'])->name('gestionInvoice')->middleware('auth');
Route::get('/demande-RendezVous', [AppointementController::class, 'rendezVous'])->name('rendezVous')->middleware('auth');



Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');


Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [AuthManager::class, 'profile'])->name('profile');
    Route::put('/profile/update', [AuthManager::class, 'update'])->name('profile.update');
});


Route::delete('/delete-user/{id}', [AuthManager::class, 'deleteUser'])->name('delete_user');


Route::get('form-email', [MailController::class, 'index'])->name('form.email');
Route::post('/send-mail', [MailController::class, 'sendEmail'])->name('send.email');


Route::get('/export_user_pdf', [AuthManager::class, 'export_user_pdf'])->name('export_user_pdf');

Route::view('/update-user', 'updateUser')->name('updateUser');

Route::get('/createUser', [AuthManager::class, 'createUser'])->name('createUser');
Route::get('/createCar', [AuthManager::class, 'createCar'])->name('createCar');

Route::post('/add-car', [AuthManager::class, 'addCar'])->name('addCar');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\annoncesController;
use App\Http\Controllers\LocationController;
use Illuminate\Http\Middleware;

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
Route::get('/index', [AnnoncesController:: class,'annoncesListe'])->name('acceuil');

Route::middleware(['guest'])->group(function(){

Route::get('/inscription', [UserController:: class,'inscription'])->name('registration');
Route::post('/inscription', [UserController:: class,'gestionInscription'])->name('registration'); 

Route::get('/connexion', [UserController:: class,'connexion'])->name('connexion');
Route::post('/connexion', [UserController:: class,'gestionConnexion'])->name('connexion');

});

Route::middleware(['auth'])->group(function(){

Route::get('/annonces', [AnnoncesController:: class,'annonces'])->name('annonces');
Route::post('/annonces', [AnnoncesController:: class,'gestionAnnonces'])->name('annonces');  
Route::get('/deconnexion', [UserController:: class,'deconnexion'])->name('deconnexion');  
    });

Route::get('/home', [UserController:: class,'dashboard']);
Route::get('/home', [AnnoncesController:: class,'annoncesListeDashboard']);

Route::get('/modifier/{id}', [AnnoncesController:: class,'update']);
Route::put('/modifier/{id}', [AnnoncesController:: class,'gestionUpdate']);

Route::delete('/delete/{id}', [AnnoncesController:: class,'supprimerAnnonce']);


Route::get('/commande', [LocationController:: class,'location'])->name('commande');
Route::post('/commande', [LocationController:: class,'gestionLocation'])->name('commande');




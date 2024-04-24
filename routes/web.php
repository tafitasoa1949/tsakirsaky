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
Route::get('/', [App\Http\Controllers\ClientController::class, 'create'])->name('huhu');
//client
Route::get('/client/', [App\Http\Controllers\ClientController::class, 'index'])->name('client.index');
Route::get('/clientCreate', [App\Http\Controllers\ClientController::class, 'create'])->name('clientCreate');
Route::post('/clientInsert', [App\Http\Controllers\ClientController::class, 'insert'])->name('clientInsert');
Route::delete('/clientDelete/{id}', [App\Http\Controllers\ClientController::class, 'delete'])->name('clientDelete');
//pack
Route::get('/pack/', [App\Http\Controllers\PackController::class, 'index'])->name('pack.index');
Route::get('/packCreate', [App\Http\Controllers\PackController::class, 'create'])->name('packCreate');
Route::post('/packInsert', [App\Http\Controllers\PackController::class, 'insert'])->name('packInsert');
Route::delete('/packDelete/{id}', [App\Http\Controllers\PackController::class, 'delete'])->name('packDelete');
Route::get('detailPack/{id}', [App\Http\Controllers\PackController::class, 'kk'])->name('detailPack');
Route::get('/huhu', [App\Http\Controllers\PackController::class, 'huhu'])->name('huhu');

//billet
Route::get('/billet/', [App\Http\Controllers\BilletController::class, 'index'])->name('billet.index');
Route::get('/billetCreate', [App\Http\Controllers\BilletController::class, 'create'])->name('billetCreate');
Route::post('/billetInsert', [App\Http\Controllers\BilletController::class, 'insert'])->name('billetInsert');
Route::delete('/billetDelete/{id}', [App\Http\Controllers\BilletController::class, 'delete'])->name('billetDelete');
Route::get('/filtreBillet/', [App\Http\Controllers\BilletController::class, 'filtreBillet'])->name('filtreBillet');
Route::get('/facturer/{id}', [App\Http\Controllers\BilletController::class, 'facturer'])->name('facturer');
Route::get('/bilan', [App\Http\Controllers\BilletController::class, 'bilan'])->name('bilan');
Route::get('/statistique', [App\Http\Controllers\BilletController::class, 'statistique'])->name('statistique');

//paiment
Route::get('/paiement/', [App\Http\Controllers\PaiementController::class, 'index'])->name('paiement.index');
Route::get('/paiementCreate', [App\Http\Controllers\PaiementController::class, 'create'])->name('paiementCreate');
Route::post('/paiementInsert', [App\Http\Controllers\PaiementController::class, 'insert'])->name('paiementInsert');
Route::get('/filtrepaiement', [App\Http\Controllers\PaiementController::class, 'filtrepaiement'])->name('filtrepaiement');


//produit
Route::get('/produit/', [App\Http\Controllers\ProduitController::class, 'index'])->name('produit.index');
Route::get('/produitCreate', [App\Http\Controllers\ProduitController::class, 'create'])->name('produitCreate');
Route::post('/produitInsert', [App\Http\Controllers\ProduitController::class, 'insert'])->name('produitInsert');
Route::delete('/produitDelete/{id}', [App\Http\Controllers\ProduitController::class, 'delete'])->name('produitDelete');
Route::get('/produitBillet/', [App\Http\Controllers\ProduitController::class, 'filtreBillet'])->name('produitBillet');
//Achat produit
Route::get('/achat', [App\Http\Controllers\AchatmatController::class, 'create'])->name('achat');
Route::post('/achatInsert', [App\Http\Controllers\AchatmatController::class, 'insert'])->name('achatInsert');

//Arret
Route::get('/arret/', [App\Http\Controllers\ArretController::class, 'index'])->name('arret.index');
Route::get('/arretCreate', [App\Http\Controllers\ArretController::class, 'create'])->name('arretCreate');
Route::post('/arretInsert', [App\Http\Controllers\ArretController::class, 'insert'])->name('arretInsert');
Route::delete('/arretDelete/{id}', [App\Http\Controllers\ArretController::class, 'delete'])->name('arretDelete');

//Axe
Route::get('/axe/', [App\Http\Controllers\AxeController::class, 'index'])->name('axe.index');
Route::get('/axeCreate', [App\Http\Controllers\AxeController::class, 'create'])->name('axeCreate');
Route::post('/axeInsert', [App\Http\Controllers\AxeController::class, 'insert'])->name('axeInsert');
Route::delete('/axeDelete/{id}', [App\Http\Controllers\AxeController::class, 'delete'])->name('axeDelete');
Route::get('/detailAxe/{id}', [App\Http\Controllers\AxeController::class, 'detailAxe'])->name('detailAxe');



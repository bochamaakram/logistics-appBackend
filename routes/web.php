<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CamionController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\ClientController;

// Show the menu page
Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/livraison/{id}/info', function () {
    return view('livraison.info');
});
// Show the form to add a product
Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
Route::post('/produits/store', [ProduitController::class, 'store'])->name('produits.store');
// Camion routes
Route::get('/camions/create', [CamionController::class, 'create'])->name('camions.create');
Route::post('/camions/store', [CamionController::class, 'store'])->name('camions.store');
// Chauffeur routes
Route::get('/chauffeurs/create', [ChauffeurController::class, 'create'])->name('chauffeurs.create');
Route::post('/chauffeurs/store', [ChauffeurController::class, 'store'])->name('chauffeurs.store');
// Display the form
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
// livraison routes
Route::get('/livraison/create', [LivraisonController::class, 'create'])->name('livraison.create');
Route::post('/livraison/store', [LivraisonController::class, 'store'])->name('livraison.store');

// Camion API Routes
Route::prefix('api')->group(function () {
    Route::get('/camions', [CamionController::class, 'index']);
    Route::get('/camions/{id}', [CamionController::class, 'show']);
    Route::post('/camions', [CamionController::class, 'store']);
    Route::put('/camions/{id}', [CamionController::class, 'update']);
    Route::delete('/camions/{id}', [CamionController::class, 'destroy']);
});
// Chauffeur API Routes
Route::prefix('api')->group(function () {
    Route::get('/chauffeurs', [ChauffeurController::class, 'index']);
    Route::get('/chauffeurs/{id}', [ChauffeurController::class, 'show']);
    Route::post('/chauffeurs', [ChauffeurController::class, 'store']);
    Route::put('/chauffeurs/{id}', [ChauffeurController::class, 'update']);
    Route::delete('/chauffeurs/{id}', [ChauffeurController::class, 'destroy']);
});
// Produit API Routes
Route::prefix('api')->group(function () {
    Route::get('/produits', [ProduitController::class, 'index']);
    Route::get('/produits/{id}', [ProduitController::class, 'show']);
    Route::post('/produits', [ProduitController::class, 'store']);
    Route::put('/produits/{id}', [ProduitController::class, 'update']);
    Route::delete('/produits/{id}', [ProduitController::class, 'destroy']);
});
// clients API Routes
Route::prefix('api')->group(function () {
    Route::get('/clients', [ClientController::class, 'index']);
    Route::get('/clients/{id}', [ClientController::class, 'show']);
    Route::post('/clients', [ClientController::class, 'store']);
    Route::put('/clients/{id}', [ClientController::class, 'update']);
    Route::delete('/clients/{id}', [ClientController::class, 'destroy']);
});
// livraisons API Routes
Route::prefix('api')->group(function () {
    Route::get('/livraisons', [LivraisonController::class, 'index']);
    Route::get('/livraisons/{id}', [LivraisonController::class, 'show']);
    Route::post('/livraisons', [LivraisonController::class, 'store']);
    Route::put('/livraisons/{id}', [LivraisonController::class, 'update']);
    Route::delete('/livraisons/{id}', [LivraisonController::class, 'destroy']);
});

// Camion Edit Route
Route::get('/camions/{id}/modifier', [CamionController::class, 'edit'])->name('camions.modifier');
Route::put('/camions/{id}', [CamionController::class, 'update'])->name('camions.update');
// Chauffeur Edit Route
Route::get('/chauffeurs/{id}/modifier', [ChauffeurController::class, 'edit'])->name('chauffeurs.modifier');
Route::put('/chauffeurs/{id}', [ChauffeurController::class, 'update'])->name('chauffeurs.update');
// Produit Edit Route
Route::get('/produits/{id}/modifier', [ProduitController::class, 'edit'])->name('produits.modifier');
Route::put('/produits/{id}', [ProduitController::class, 'update'])->name('produits.update');
// clients Edit Route
Route::get('/clients/{id}/modifier', [ClientController::class, 'edit'])->name('clients.modifier');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
// livraisons Edit Route
Route::get('/livraisons/{id}/modifier', [LivraisonController::class, 'edit'])->name('livraison.modifier');
Route::put('/livraisons/{id}', [LivraisonController::class, 'update'])->name('livraison.update');

//supprimer produit by id
Route::get('/produits/{id}/supprimer', [ProduitController::class, 'destroy'])->name('produits.supprimer');
//supprimer clients by id
Route::get('/clients/{id}/supprimer', [ClientController::class, 'destroy'])->name('clients.supprimer');
//supprimer chauffeurs by id
Route::get('/chauffeurs/{id}/supprimer', [ChauffeurController::class, 'destroy'])->name('chauffeurs.supprimer');
//supprimer camions by id
Route::get('/camions/{id}/supprimer', [CamionController::class, 'destroy'])->name('camions.supprimer');
//supprimer livraisons by id
Route::get('/livraisons/{id}/supprimer', [LivraisonController::class, 'destroy'])->name('livraisons.supprimer');


Route::get('/{any}', function () {
    return view('index'); // Serve the React app's index.html
})->where('any', '.*');
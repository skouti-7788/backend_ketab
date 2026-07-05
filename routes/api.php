<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LivresController;
use App\Http\Controllers\Api\AdherentsController;
use App\Http\Controllers\Api\EmpruntsController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\ShowlivresController;
use App\Http\Controllers\Api\BlacklisteController;
use App\Http\Controllers\Api\AcheterController;
use App\Http\Controllers\Api\TelechargerController;
use App\Http\Controllers\Api\OpinionsController;
use App\Http\Controllers\Api\DescriptionController;
use App\Http\Controllers\Api\AdminController;



Route::get('/livres', [LivresController::class, 'index']);
Route::post('/livres', [LivresController::class, 'ajouter']);
Route::put('/livres/{id}', [LivresController::class, 'modify']);
Route::delete('/livres/{id}', [LivresController::class, 'delete']);

Route::get('/adherents', [AdherentsController::class, 'index']);
Route::post('/adherents', [AdherentsController::class, 'ajouter']);
Route::put('/adherents/{id}', [AdherentsController::class, 'modify']);
Route::put('/adherents/by-user/{userId}', [AdherentsController::class, 'modifyByUserId']);
Route::delete('/adherents/{id}', [AdherentsController::class, 'delete']);

Route::get('/emprunts',[EmpruntsController::class, 'index']);
Route::post('/emprunts',[EmpruntsController::class, 'ajouter']);
Route::put('/emprunts/{id}',[EmpruntsController::class, 'modify']);
Route::delete('/emprunts/{id}',[EmpruntsController::class, 'delete']);
Route::post('/emprunts/check',[EmpruntsController::class, 'checkdate']);


Route::get('/history', [HistoryController::class, 'index']);
Route::post('/history', [HistoryController::class, 'ajouter']);
Route::post('/history/check', [HistoryController::class, 'check']);

Route::get('/favorite', [FavoriteController::class, 'index']);
Route::post('/favorite', [FavoriteController::class, 'store']);
Route::delete('/favorite', [FavoriteController::class, 'destroy']);
Route::post('/favorite/check', [FavoriteController::class, 'check']);

Route::get('/showlivres', [ShowlivresController::class, 'index']);
Route::post('/showlivres', [ShowlivresController::class, 'store']);
Route::post('/showlivres/check', [ShowlivresController::class, 'check']);

Route::get('/blacklistes', [BlacklisteController::class, 'index']);
Route::post('/blacklistes', [BlacklisteController::class, 'store']);
Route::post('/blacklistes/check', [BlacklisteController::class, 'check']);

Route::get('/acheter', [AcheterController::class, 'index']);
Route::post('/acheter', [AcheterController::class, 'store']);
Route::put('/acheter/{id}', [AcheterController::class, 'update']);
Route::delete('/acheter/{id}', [AcheterController::class, 'destroy']);
Route::post('/acheter/{id}/payment', [AcheterController::class, 'payment']);
Route::put('/acheter/{id}/accept', [AcheterController::class, 'acceptePhysicalBook']);
Route::put('/acheter/{id}/reject', [AcheterController::class, 'rejectPhysicalBook']);
Route::put('/acheter/{id}/cancel-payment', [AcheterController::class, 'cancelPayment']);

Route::get('/telecharger', [TelechargerController::class, 'index']);
Route::post('/telecharger', [TelechargerController::class, 'store']);
Route::put('/telecharger/{id}', [TelechargerController::class, 'update']);
Route::delete('/telecharger/{id}', [TelechargerController::class, 'destroy']);

// Route::get('/livres/{livre_id}/opinions', [OpinionsController::class, 'index']);
// Route::post('/opinions', [OpinionsController::class, 'store'])->middleware('jwt');
// Route::put('/opinions/{id}', [OpinionsController::class, 'update']);
// Route::delete('/opinions/{id}', [OpinionsController::class, 'destroy']);

Route::post('/register', [UsersController::class, 'register']);
Route::post('/login', [UsersController::class, 'login']);

Route::post('/admin/register', [AdminController::class, 'register']);
Route::post('/admin/login', [AdminController::class, 'login']);

Route::middleware('jwt')->group(function () {

    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/logout', [UsersController::class, 'logout']);

    Route::get('/admin', [AdminController::class, 'index']);
    Route::post('/admin/logout', [AdminController::class, 'logout']);

    Route::get('/livres/{livre_id}/opinions', [OpinionsController::class, 'index']);
    Route::post('/opinions', [OpinionsController::class, 'store']);
    Route::put('/opinions/{id}', [OpinionsController::class, 'update']);
    Route::delete('/opinions/{id}', [OpinionsController::class, 'destroy']);
});

Route::get('/livres/{livre_id}/description', [DescriptionController::class, 'show']);
Route::post('/descriptions', [DescriptionController::class, 'store']);
Route::put('/descriptions/{id}', [DescriptionController::class, 'update']);
Route::delete('/descriptions/{id}', [DescriptionController::class, 'destroy']);
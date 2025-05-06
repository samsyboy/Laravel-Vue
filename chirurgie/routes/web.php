<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StoryController;
use App\Http\Controllers\Api\ChapterController;
use App\Http\Controllers\Api\ChoiceController;

// 🌐 Route d'accueil
Route::get('/', function () {
    return view('home');
});

// 📦 Groupe de routes API
Route::prefix('/api')->group(function () {
    // Stories
    Route::get('/stories', [StoryController::class, 'index']);
    Route::post('/stories', [StoryController::class, 'store']);

    // Chapters
    Route::get('/chapters', [ChapterController::class, 'index']);
    Route::get('/chapters/{id}', [ChapterController::class, 'show']); // 👈 ajouté ici
    Route::middleware('auth:sanctum')->post('/chapters', [ChapterController::class, 'store']); // route protégée

    // Choices
    Route::get('/choices', [ChoiceController::class, 'index']);
    Route::post('/choices', [ChoiceController::class, 'store']);
});

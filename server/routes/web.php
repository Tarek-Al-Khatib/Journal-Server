<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix("user")->group(function(){
    Route::post("/login", [UserController::class, "login"]);
    Route::post("/register", [UserController::class, "register"]);
});


Route::prefix("journal")->group(function(){
    Route::get("/{id}", [JournalController::class, "getJournals"]);
    Route::post("/{id}", [JournalController::class, "postJournal"]);
    Route::put("/{id}", [JournalController::class, "editJournal"] );
    Route::delete("/{id}", [JournalController::class, "removeJournal"]);
});

Route::prefix("article")->group(function(){
    Route::get("/", [ArticleController::class, "getArticles"]);
    Route::get("/{id}", [ArticleController::class, "getArticlesByUser"] );
    Route::post("/{id}", [ArticleController::class, "postArticle"]);
});



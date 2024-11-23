<?php

use App\Http\Controllers\JournalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix("journal")->group(function(){
    Route::get("/{id}", [JournalController::class, "getJournals"]);
    Route::post("/{id}", [JournalController::class, "postJournal"]);
    Route::put("/{id}", [JournalController::class, "editJournal"] );
    Route::delete("/{id}", [JournalController::class, "removeJournal"]);
});


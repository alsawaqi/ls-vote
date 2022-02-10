<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;



Route::get('/',[IdeaController::class,'index'])->name('idea.index');
Route::get('/ideas/{idea:slug}',[IdeaController::class,'show'])->name('idea.show');





Route::get('/welcome', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';

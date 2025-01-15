<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/db/seed/fake','seedFakeDataToDB');
    Route::get('/db/seed/fake/articles/{num}','seedArticlesToDB');
});

Route::get('/articles/all',[ArticleController::class, 'getAll']);
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\User;
use App\Models\Cabinet;
use App\Models\Drawer;
use App\Models\Folder;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/db/seed/fake', function() {

    Cabinet::factory()->has(
        Drawer::factory()->count(3)->has(
            Folder::factory()->count(1)))->count(4)->create();
    
    // Method calls User Factory and simultaneously creates articles attached to the created user. 
    User::factory()->has(Article::factory()->count(3), 'articles')->create();
    return view('welcome');
});

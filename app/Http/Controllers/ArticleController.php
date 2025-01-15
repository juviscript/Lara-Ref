<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getAll() {
        $articles = Article::all("*");
        return view('articles', ['articles' => $articles]);
    }
}

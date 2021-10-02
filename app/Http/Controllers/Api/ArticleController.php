<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
    public function show(Request $request)
    {
        $slug = $request->get('slug');
        $article = Article::findBySlug($slug);
        return new ArticleResource($article);
    }
}

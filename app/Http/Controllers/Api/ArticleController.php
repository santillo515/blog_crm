<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
    public function show()
    {
        $article = Article::with('comments', 'tags', 'state')
            ->first();
        return new ArticleResource($article);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LikesController extends Controller
{
    public function like (int $articleId)
    {
        $article = Article::find($articleId);
        $article->nbLikes ++ ;
        $article->save();

        return back();
    }
}

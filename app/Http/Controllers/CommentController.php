<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $content = $request->input('content');
            $articleId = $request->input('articleId');

            // Ajout du commentaire en bdd
            Comment::create([
                'content' => $content,
                'article_id' => $articleId,
                'user_id' => Auth::user()->id
            ]);

            return redirect()->back();
        }
        else {
            return redirect()->route('login');
        }
    }
}

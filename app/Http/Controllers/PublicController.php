<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->input('user');  // Retrieve the selected user's ID from the form
    
        // Fetch the user and their articles
        $user = User::findOrFail($userId);  // Fetch the user by ID
        $articles = Article::where('user_id', $user->id)->where('draft', 0)->get();
    
        // Return the view with the articles and the selected user
        return view('public.index', [
            'articles' => $articles,
            'user' => $user
        ]);
    }
    

    public function show(User $user, Article $article)
    {
        //on cherche l'article sélectionné
        $arti = Article::where('id', $article->id)->where('user_id', $user->id)->where('draft', 0)->first();

        // On retourne la vue.
        return view('public.show', ['article' => $arti]);
    }

    public function home(){
        $articles = Article::orderBy('nbLikes', 'desc')->take(4)->get();
        return view('welcome', ['articles' => $articles]);
    }

    public function all(){
        $users = User::all();
        return view('public.all', ['users' => $users, 'articles' => Article::paginate(4)]);
    }
}

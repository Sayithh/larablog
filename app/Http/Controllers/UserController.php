<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
Use App\Models\Article;


class UserController extends Controller
{
    public function create()
    {
        return view('articles.create');
    }
    public function store(Request $request)
    {
        // On récupère les données du formulaire
        $data = $request->only(['title', 'content', 'draft']);

        // Créateur de l'article (auteur)
        $data['user_id'] = Auth::user()->id;

        // Gestion du draft
        $data['draft'] = isset($data['draft']) ? 1 : 0;

        // On crée l'article
        $article = Article::create($data); // $Article est l'objet article nouvellement créé

        // Exemple pour ajouter la catégorie 1 à l'article
        // $article->categories()->sync(1);

        // Exemple pour ajouter des catégories à l'article
        // $article->categories()->sync([1, 2, 3]);

        // Exemple pour ajouter des catégories à l'article en venant du formulaire
        // $article->categories()->sync($request->input('categories'));

        // On redirige l'utilisateur vers la liste des articles
        return redirect()->route('dashboard');
    }

    public function index()
    {
        // On récupère l'utilisateur connecté.
        $user = Auth::user();

        // On retourne la vue.
        return view('dashboard', []);
    }
}   

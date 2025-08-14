<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function favoriteOrNot($id)
    {
        $user = Auth::user();
        $filme = Filme::findOrFail($id);

        if ($user->favoriteMovies()->where('filme_id', $id)->exists()) {
            $user->favoriteMovies()->detach($id);
        } else {
            $user->favoriteMovies()->attach($id);
        }

        return redirect()->back();
    }

    public function showFavorites()
    {
        $user = Auth::user();
        $favorites = $user->favoriteMovies()->paginate(10);

        return view('filmes/favorites', ['favorites' => $favorites]);
    }
}

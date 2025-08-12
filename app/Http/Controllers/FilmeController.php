<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilmeController extends Controller
{
    public function showFilmes(){
        return view('filmes/index');
    }

    public function admin(){
        $user = Auth::user();

        if($user->nivel_acesso==1){
            return view('filmes/admin');
        }else{
            return redirect()->route('filmes');
        }
    }

    public function create(){

        $user = Auth::user();

        if($user->nivel_acesso==1){
            $categorias = Categoria::all();

            return view('filmes/create', ['categorias'=>$categorias]);
        }else{
            return redirect()->route('filmes');
        }
    }

    public function store(Request $request){
        $request->validate(['imagem_da_capa' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048']);

        if($request->hasFile('imagem_da_capa')){
            $imagem = $request->file('imagem_da_capa');
            $caminhoImagem = $imagem->store('filmes', 'public');

            Filme::create([
                'nome'=> $request->nome,
                'sinopse'=> $request->sinopse,
                'ano'=> $request->ano,
                'imagem_da_capa'=> $caminhoImagem,
                'categoria_id'=> $request->categoria_id,
                'link_trailer'=> $request->link_trailer,
            ]);
        }else{
            Filme::create($request->all());
        }
        return redirect()->route('filmes.admin');
    }
}

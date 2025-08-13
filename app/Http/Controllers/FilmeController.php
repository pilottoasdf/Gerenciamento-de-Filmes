<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilmeController extends Controller
{
    public function showFilmes(){
        $filmes = Filme::all();

        return view('filmes/index', ['filmes'=>$filmes]);
    }

    public function admin(){
        $user = Auth::user();

        if($user->nivel_acesso==1){
            $filmes = Filme::all();
            
            return view('filmes/admin', ['filmes'=>$filmes]);
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

    public function destroy($id){
        $user = Auth::user();

        if($user->nivel_acesso != 1){
            return redirect()->route('filmes')->with('error', 'Acesso negado');
        }

        $filme = Filme::findOrFail($id);

        if ($filme->imagem_da_capa) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($filme->imagem_da_capa);
            $filme->imagem_da_capa = null;
            $filme->save();
        }
        $filme->delete();

        return redirect()->route('filmes.admin');
    }

    public function edit($id){
        $user = Auth::user();

        if($user->nivel_acesso != 1){
            return redirect()->route('filmes')->with('error', 'Acesso negado');
        }

        $filme = Filme::findOrFail($id);
        $categorias = Categoria::all();

        return view('filmes/edit', ['filme'=>$filme, 'categorias'=>$categorias]);
    }

    public function update(Request $request, $id){
        $user = Auth::user(); 

            if ($user->nivel_acesso == 1) {
                $filme = Filme::findOrFail($id);

                if($request->hasFile('imagem_da_capa')){

                    $request->validate(['imagem_da_capa' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048']);

                    if(isset($filme->imagem_da_capa)){
                        \Illuminate\Support\Facades\Storage::delete('public/' . $filme->imagem_da_capa);
                        $filme->imagem_da_capa = null;
                        $filme->save();

                    }

                    $imagem = $request->file('imagem_da_capa');
                    $caminhoImagem = $imagem->store('filmes', 'public');
                    $filme->imagem_da_capa = $caminhoImagem;
                    $filme->save();
                }

            $filme->nome = $request->nome;
            $filme->sinopse = $request->sinopse;
            $filme->ano = $request->ano;
            $filme->categoria_id = $request->categoria_id;
            $filme->link_trailer = $request->link_trailer;

            $filme->save();

            return redirect()->route('filmes.admin')->with('success', 'Filme atualizado com sucesso!');
        }
    }
}

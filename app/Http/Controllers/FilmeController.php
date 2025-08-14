<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilmeController extends Controller
{
    public function showFilmes(Request $request){
        if($request->categoria_id!=0 && $request->ano!=null){
            $filmes=Filme::where('categoria_id', $request->categoria_id)->where('ano', $request->ano)->get();
        }else if($request->categoria_id!=0){
            $filmes=Filme::where('categoria_id', $request->categoria_id)->get();
        }else if($request->ano!=null){
            $filmes=Filme::where('ano', $request->ano)->get();
        }else{
            $filmes = Filme::all();
        }

        $categoria_id = $request->categoria_id ?? null;
        $ano = $request->ano ?? null;

        $categorias = Categoria::all();

        return view('filmes/index', ['filmes'=>$filmes, 'categorias'=>$categorias, 'categoria_id'=>$categoria_id, 'ano'=>$ano]);
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

    public function info($id){
        $filme = Filme::with('categoria')->findOrFail($id);
        return view('filmes/info', ['filme'=>$filme]);

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

        $link_embed = str_replace('watch?v=', 'embed/', $request->link_trailer);;

        if($request->hasFile('imagem_da_capa')){
            $imagem = $request->file('imagem_da_capa');
            $caminhoImagem = $imagem->store('filmes', 'public');

            Filme::create([
                'nome'=> $request->nome,
                'sinopse'=> $request->sinopse,
                'ano'=> $request->ano,
                'imagem_da_capa'=> $caminhoImagem,
                'categoria_id'=> $request->categoria_id,
                'link_trailer'=> $link_embed,
            ]);
        }else{

            Filme::create([
                'nome'=> $request->nome,
                'sinopse'=> $request->sinopse,
                'ano'=> $request->ano,
                'categoria_id'=> $request->categoria_id,
                'link_trailer'=> $link_embed,
            ]);
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

        $link_embed = str_replace('watch?v=', 'embed/', $request->link_trailer);;

            if ($user->nivel_acesso == 1) {
                $filme = Filme::findOrFail($id);

                if($request->hasFile('imagem_da_capa')){

                    $request->validate(['imagem_da_capa' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048']);

                    if($filme->imagem_da_capa){
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($filme->imagem_da_capa);
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
            $filme->link_trailer = $link_embed;

            $filme->save();

            return redirect()->route('filmes.admin')->with('success', 'Filme atualizado com sucesso!');
        }
    }
}

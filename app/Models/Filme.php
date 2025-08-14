<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Filme extends Model
{
    protected $fillable = [
        'nome',
        'sinopse',
        'ano',
        'categoria',
        'imagem_da_capa',
        'link_trailer',
        'categoria_id',
    ];

    public function categoria():BelongsTo{
        return $this->belongsTo(Categoria::class);
    }

    public function favorited(){
        return $this->belongsToMany(User::class, 'favorites', 'filme_id', 'user_id')->withTimestamps();
    }
}
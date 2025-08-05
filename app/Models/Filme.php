<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $fillable = [
        'nome',
        'ano',
        'categoria',
        'imagem_da_capa',
        'link_trailer',
    ];
}
<?php

namespace Database\Seeders;

use App\Models\Filme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Filme::create([
            'nome' => 'Quarteto Fantástico',
            'sinopse' => 'Um grupo de astronautas passa por uma tempestade cósmica durante seu voo experimental. Ao retornar à Terra, os tripulantes descobrem que possuem novas e bizarras habilidades. Reed Richards pode esticar seu corpo. Sua noiva, Susan Storm, ganha a habilidade de se tornar invisível. Seu irmão mais novo, Johnny Storm, adquiriu o poder de controlar o fogo e voar. Já o piloto Ben Grimm foi transformado em um monstro rochoso. Ao tentar compreender seus poderes, eles têm que lidar com novas ameaças.',
            'ano' => '2025',
            'imagem_da_capa' => 'filmes/hqXgMpaJVIbwkaGa8Q8YSJUnPyTlKFIczTTWhLIr.jpg',
            'link_trailer' => 'https://www.youtube.com/embed/P273sRlm4tM',
            'categoria_id' => '1',
        ]);

        Filme::create([
            'nome' => 'Meu Malvado Favorito',
            'sinopse' => 'Um homem que adora todas as coisas diabólicas, o supervilão Gru traça um plano para roubar a lua. Rodeado de um exército de pequenos ajudantes e seu arsenal de armas e máquinas de guerra, Gru se prepara para destruir quem atravessar seu caminho. Mas ele não esperava pelo seu maior desafio: três adoráveis órfãs que querem ter Gru como pai.',
            'ano' => '2010',
            'imagem_da_capa' => 'filmes/f1OoLLNlw0nZReJzVt1923iOuJEItqtFvIcM9AqZ.jpg',
            'link_trailer' => '',
            'categoria_id' => '7',
        ]);

        Filme::create([
            'nome' => 'Revolução dos Bichos',
            'sinopse' => 'Uma noite, quando o fazendeiro Jones foi dormir, todos os animais de sua fazenda se reúnem e, liderados por um porco sábio, decidem lutar contra o homem que os cria para abate. Os animais se rebelam, tomam conta da fazenda expulsando Jones e estabelecem suas próprias leis e regras. Adaptação cinematográfica do popular romance homônimo de George Orwell que mostra a dureza com que os idealismos são superados quando a luta pelo poder entra em jogo. O responsável pelo filme é John Stephenson, que estreia na direção. Stephenson tem especial cuidado em respeitar a complexidade do texto em que se baseia, uma crítica engenhosa ao stalinismo, que se tornou um clássico da literatura do século XX. Além disso, para dar verossimilhança à história, conta com os últimos desenvolvimentos em animatrônica, técnica de animação usada em outros filmes de animais, como Babe. O ator inglês Pete Posthlethwaite interpreta o fazendeiro, o único humano a aparecer no filme. Na versão original, as vozes dos animais são fornecidas por atores proeminentes como Julia Ormond, Kelsey Grammer e Peter Ustinov.',
            'ano' => '1999',
            'imagem_da_capa' => 'filmes/InURvi6ZxJl2H6Dbjp89XvMYTSwzwtm865SE0izt.jpg',
            'link_trailer' => '',
            'categoria_id' => '6',
        ]);

        Filme::create([
            'nome' => 'Minecraft',
            'sinopse' => 'Um portal misterioso atrai quatro desajustados para o Overworld, uma terra das maravilhas bizarras e cúbicas que prospera com a imaginação. Para voltar para casa, eles têm que dominar o terreno enquanto embarcam em uma missão mágica com um construtor inesperado chamado Steve.',
            'ano' => '2025',
            'imagem_da_capa' => 'filmes/P99aX67iiPYnwFUBJr0UluDFYkvgAhzeQXQWbIeZ.jpg',
            'link_trailer' => '',
            'categoria_id' => '7',
        ]);
    }
}

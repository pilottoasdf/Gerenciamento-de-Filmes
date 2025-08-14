<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Filmes') }}
        </h2>
    </x-slot>

   <div class="p-4">
        <h2 class="text-2xl font-semibold mb-4">Filmes Favoritos</h2>

        @if($favorites->isNotEmpty())
            @foreach($favorites as $filme)
                <a href="{{ route('filme.info', $filme->id) }}">
                    <div class="bg-white rounded-lg shadow transition duration-300 transform hover:-translate-y-1 hover:scale-105 hover:shadow-2xl hover:ring-2 hover:ring-gray-400 overflow-hidden cursor-pointer">
                        @if ($filme->imagem_da_capa) 
                            <img src="{{ asset('storage/' . $filme->imagem_da_capa) }}" 
                                alt="imagem"
                                class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                                Sem imagem
                            </div>
                        @endif

                        <div class="p-4 flex flex-col gap-1">
                            <span class="text-lg font-semibold truncate">{{ $filme->nome }}</span>
                            <span class="text-sm text-gray-600">Categoria: {{ $filme->categoria->nome }}</span>
                            <span class="text-sm text-gray-600">Ano: {{ $filme->ano }}</span>
                        </div>

                    </div>
                </a>
            @endforeach
        @else
            <p>Você não adicionou nenhum filme aos favoritos.</p>
        @endif

        {{ $favorites->links() }}
    </div> 
</x-app-layout>

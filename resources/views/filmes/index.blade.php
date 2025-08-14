<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Filmes') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <span class="text-xl ms-5">Filtrar por</span>
            <form method="GET" class="flex flex-row justify-evenly align w-2/5">
                <div>
                    <x-input-label for="categoria_id" :value="__('Categoria')" />
                    <select name="categoria_id" id="categoria_id">
                        <option value="0">Todas</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-input-label for="ano" :value="__('Ano')" />
                    <x-text-input id="ano" class="block mt-1 w-24" type="number" name="ano"
                    :value="old('ano')" autofocus />
                </div>

                <x-primary-button class="m-5">Filtrar</x-primary-button>
            </form>

            <a href="{{ route('filme.favorites') }}" class="text-blue-500 hover:underline">Ver Filmes Favoritos</a>

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @if ($filmes->isNotEmpty())
                        @foreach ($filmes as $filme)
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

                                    <form action="{{ route('filme.favorite', $filme->id) }}" method="post">
                                        @csrf
                                        <button type="submit">
                                            {{ Auth::user()->favoriteMovies->contains($filme->id) ? 'Desfavoritar' : 'Favoritar' }}
                                        </button>
                                    </form>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <h2>Não foi possível encontrar nenhum filme.</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

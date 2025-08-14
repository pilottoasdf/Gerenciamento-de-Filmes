<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administração') }}
        </h2>
    </x-slot>

    <a href="{{ route('filme.create') }}"><x-primary-button>Adicionar filme</x-primary-button></a>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($filmes as $filme)
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
                                <form action="{{ route('filme.destroy', $filme->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mt-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-200">
                                        Excluir
                                    </button>
                                </form>
                                <a href="{{ route('filme.edit', $filme->id) }}" class="btn btn-warning btn-sm p-2 text-gray-600">Editar</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

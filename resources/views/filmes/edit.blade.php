<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Filme') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('filme.update', $filme->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nome</label>
                        <input type="text" name="nome" value="{{ old('nome', $filme->nome) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                               required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Sinopse</label>
                        <textarea name="sinopse" rows="4"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('sinopse', $filme->sinopse) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ano</label>
                        <input type="number" name="ano" value="{{ old('ano', $filme->ano) }}"
                               class="mt-1 block w-32 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Categoria</label>
                        <select name="categoria_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $filme->categoria_id == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Link do Trailer</label>
                        <input type="text" name="link_trailer" value="{{ old('link_trailer', $filme->link_trailer) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Imagem de Capa</label>
                        @if($filme->imagem_da_capa)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$filme->imagem_da_capa) }}" alt="Capa" class="w-40 h-56 object-cover rounded-md shadow">
                            </div>
                        @endif
                        <input type="file" name="imagem_da_capa"
                               class="mt-3 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                               file:rounded-full file:border-0
                               file:text-sm file:font-semibold
                               file:bg-indigo-50 file:text-indigo-700
                               hover:file:bg-indigo-100">
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('filmes.admin') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 mr-2">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                            Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

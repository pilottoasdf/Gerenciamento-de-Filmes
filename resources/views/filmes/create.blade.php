<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar filme') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('filme.store') }}" enctype="multipart/form-data">
                        @csrf

                        <x>
                            <x-input-label for="nome" :value="__('Nome')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome"
                                :value="old('nome')" required autofocus autocomplete="nome" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />

                            <x-input-label for="sinopse" :value="__('Sinopse')" />
                            <x-textarea id="sinopse" class="block mt-1 w-full" type="text" name="sinopse"
                            required autofocus autocomplete="sinopse" > {{ old('sinopse') }} </x-textarea>
                            <x-input-error :messages="$errors->get('sinopse')" class="mt-2" />

                            <x-input-label for="ano" :value="__('Ano')" />
                            <x-text-input id="ano" class="block mt-1 w-full" type="number" name="ano"
                                :value="old('ano')" required autofocus autocomplete="ano" />
                            <x-input-error :messages="$errors->get('ano')" class="mt-2" />

                            <x-input-label for="imagem_da_capa" :value="__('Capa do filme')" />
                            <x-image-input id="imagem_da_capa" name="imagem_da_capa" class="mt-2" :value="old('imagem_da_capa')" />
                            <x-input-error :messages="$errors->get('imagem_da_capa')" class="mt-2" />

                            <x-input-label for="link_trailer" :value="__('Link do trailer')" />
                            <x-text-input id="link_trailer" class="block mt-1 w-full" type="text" name="link_trailer"
                                :value="old('link_trailer')" required autofocus autocomplete="link_trailer" />
                            <x-input-error :messages="$errors->get('link_trailer')" class="mt-2" />

                            <x-input-label for="categoria_id" :value="__('Categoria')" />
                            <select name="categoria_id" id="categoria_id">
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>

                        </div>

                        <x-primary-button class="m-5">Salvar filme</x-primary-button>

                
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

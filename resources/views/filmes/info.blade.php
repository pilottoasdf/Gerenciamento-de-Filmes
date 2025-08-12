<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ $filme->nome }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="flex flex-col md:flex-row gap-8 p-6">
                    <div class="md:w-1/2 flex items-center justify-center">
                        @if ($filme->imagem_da_capa)
                            <img src="{{ asset('storage/' . $filme->imagem_da_capa) }}"
                                 alt="Capa de {{ $filme->nome }}"
                                 class="rounded-xl shadow-lg object-contain max-h-[400px] w-full" />
                        @else
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-400 rounded-xl">
                                Sem imagem
                            </div>
                        @endif
                    </div>

                    <div class="md:w-1/2 flex flex-col justify-between">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Categoria: <span class="font-semibold">{{ $filme->categoria->nome }}</span></p>
                            <p class="text-sm text-gray-600 mb-6">Ano: <span class="font-semibold">{{ $filme->ano }}</span></p>

                            <h2 class="text-2xl font-bold mb-3">Sinopse</h2>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $filme->sinopse }}</p>
                        </div>
                    </div>
                </div>

                    <div class="p-6 border-t bg-gray-50">
                        <h2 class="text-2xl font-bold mb-4">Trailer</h2>
                        <div class="w-full max-w-5xl mx-auto rounded-xl overflow-hidden shadow-lg aspect-w-16 aspect-h-9" style="height: 480px;">
                            <iframe src="{{ $filme->link_trailer }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    class="w-full h-full">
                            </iframe>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>

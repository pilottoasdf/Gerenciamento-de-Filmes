<!DOCTYPE html>
<html lang="pt-BR" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Página Inicial</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-full bg-gray-50 text-gray-900 font-sans">

    <main class="bg-white border border-black rounded-lg shadow-md p-8 w-full max-w-md flex flex-col gap-6">
        <h1 class="text-xl font-bold text-center">Gerenciador de Filmes</h1>

        @if (Route::has('login'))
            <div class="flex justify-center gap-4">
                @auth
                    <a href="{{ url('/filmes') }}"
                       class="inline-block px-6 py-2 border border-gray-300 rounded-sm text-sm font-medium hover:border-gray-400 transition-colors">
                       Entrar
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-block px-6 py-2 border border-gray-300 rounded-sm text-sm font-medium hover:border-gray-400 transition-colors">
                       Fazer Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="inline-block px-6 py-2 border border-gray-300 rounded-sm text-sm font-medium hover:border-gray-400 transition-colors">
                           Registrar
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </main>

</body>
</html>

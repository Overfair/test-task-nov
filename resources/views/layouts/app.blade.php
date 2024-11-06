<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal ">

    <div class="flex">
        <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 flex flex-col overflow-y-auto sidebar">
            <div class="px-6 py-4 text-lg font-semibold border-b border-gray-700">АДМИН ПАНЕЛЬ</div>

            <nav class="flex-1 px-4 py-2">
                <div x-data="{ open: true }">
                    <a @click="open = !open"
                        class="block px-4 py-3 mt-2 text-sm text-gray-200 hover:bg-gray-700 rounded cursor-pointer flex justify-between items-center">
                        Администрирование
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7 7 7-7" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7-7-7 7" />
                        </svg>
                    </a>
                    <div x-show="open" class="mt-2 space-y-2 pl-4">
                        <a href="{{ route('genres.index') }}"
                            class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 rounded">Жанры</a>
                            <a href="{{ route('movies.index') }}"
                            class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-700 rounded">Фильмы</a>
                    </div>
                </div>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col ml-64 min-h-screen">
            <header class="bg-white shadow px-6 py-4 border-b">
                <div class="container mx-auto flex justify-between items-center max-w-full">
                    <h1 class="text-xl font-semibold">@yield('title')</h1>
                </div>
            </header>

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>
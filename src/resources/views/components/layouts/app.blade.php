<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Plenty of Novel Friends</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="relative flex min-h-screen bg-gray-100 dark:bg-gray-900 p-5 grid grid-cols-8 gap-5 max-w-6xl mx-auto">
    <div class="col-span-2 space-y-6">
        <h1 class="text-2xl font-bold tracking-tight text-white text-center">Plenty of Novel Friends</h1>
        <hr class="h-0.5 mx-auto my-4 bg-emerald-100 border-0 rounded md:my-5 dark:bg-emerald-700">
        @auth
        <div>
            <ul>
                <li>
                    <div class="flex">
                        <img class="rounded" src="https://placeducky.com/real/60/60.jpg">
                        <div class="flex-1 px-5">
                            <span class="text-base text-white block">{{ auth()->user()->name }}</span>
                            <span class="italic text-sm text-gray-500 block">This is a subtitle.</span>
                        </div>
                    </div>
                </li>
            </ul>
            <hr class="h-0.5 mx-auto my-4 bg-emerald-100 border-0 rounded md:my-5 dark:bg-emerald-700">
            <ul>
                <li>
                    <a href="/" class="text-md text-gray-400 hover:text-emerald-200 block py-1">Feed</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="/" class="text-md text-gray-400 hover:text-emerald-200 block py-1">My Books</a>
                </li>
                <li>
                    <a href="/" class="text-md text-gray-400 hover:text-emerald-200 block py-1">Add a book</a>
                </li>
                <li>
                    <a href="/" class="text-md text-gray-400 hover:text-emerald-200 block py-1">Friends</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="/" class="text-md text-gray-400 hover:text-emerald-200 block py-1">Log out</a>
                </li>
            </ul>
        </div>
        @endauth

        @guest
        <div>
            <ul>
                <li>
                    <a href="/" class="text-md text-gray-400 hover:text-emerald-200 block py-1">Login</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="/auth/register" class="text-md text-gray-400 hover:text-emerald-200 block py-1">Register</a>
                </li>
            </ul>
        </div>
        @endguest
    </div>
    <div class="col-span-6 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg container mx-auto p-5 h-100">
        <div class="mb-3">
            @isset($header)
            <h1 class="font-bold text-2xl text-white">
                {{ $header }}
            </h1>
            @endisset
        </div>
        <div class="text-white">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
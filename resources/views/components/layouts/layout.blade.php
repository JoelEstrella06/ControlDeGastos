<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestor de gastos</title>
        @if (request()->routeIs('home'))
            @vite(['resources/css/app.css'])
        @else
            @vite(['resources/css/app.css','resources/js/app.js'])  
        @endif
    </head>
    <body class=" bg-gradient-to-r from-slate-200  to-slate-500 ">
        <x-navbar/>
        <x-alert/>
        <main class="max-w-7xl m-auto pt-7 pb-5 px-2 sm:px-0">
            {{$content}}
        </main>
    </body>
</html>

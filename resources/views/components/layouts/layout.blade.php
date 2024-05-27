<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestor de gastos</title>
        @vite('resources/css/app.css')
    </head>
    <body class=" bg-slate-200">
        <x-navbar/>
        <x-alert/>
        <main class="max-w-7xl m-auto pt-7 pb-5 px-2 sm:px-0">
            {{$content}}
        </main>
    </body>
</html>

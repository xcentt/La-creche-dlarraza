<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="La crèche d'ilarraza: una escuela imaginaria para aprender, explorar y crecer.">
        <meta name="theme-color" content="#f7f5ef">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <title>@yield('title', "La crèche d'ilarraza")</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Unbounded:wght@400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-paper font-sans text-ink antialiased">
        @yield('content')
    </body>
</html>

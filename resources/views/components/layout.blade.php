<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    @if(app()->environment('production'))
        <link rel="stylesheet" href="{{ asset('build/assets/app-CQ3gKn39.css') }}">
        <script type="module" src="{{ asset('build/assets/app-Bj43h_rG.js') }}"></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <nav class="bg-gradient-to-r from-violet-900 via-purple-900 to-indigo-900 backdrop-blur-lg border-b border-white/10 p-6 flex justify-between items-center shadow-2xl">
        <a href="{{ route('home') }}" class="nav-link font-black text-xl">Accueil</a>
        <div class="flex gap-8">
            <a href="{{ route('projects.index') }}" class="nav-link">Projets</a>
            <a href="{{ route('contact.show') }}" class="nav-link">Contact</a>
        </div>
    </nav>
    <main class="container mx-auto px-4 py-12">
        {{$slot}}
    </main>
    
</body>
</html>
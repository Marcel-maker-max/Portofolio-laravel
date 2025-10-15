<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Portfolio</title>
    @if(app()->environment('production'))
        <link rel="stylesheet" href="{{ asset('build/assets/app-CQ3gKn39.css') }}">
        <script type="module" src="{{ asset('build/assets/app-Bj43h_rG.js') }}"></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <nav class="bg-gradient-to-r from-violet-900 via-purple-900 to-indigo-900 backdrop-blur-lg border-b border-white/10 p-6">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">Admin Portfolio</h1>
            <div class="flex gap-6">
                <a href="{{ route('home') }}" class="nav-link">Voir le site</a>
                <a href="{{ route('projects.index') }}" class="nav-link">Projets</a>
                <a href="{{ route('skills.index') }}" class="nav-link">Compétences</a>
                <a href="{{ route('contacts.admin') }}" class="nav-link">Messages</a>
            </div>
        </div>
    </nav>
    
    <main class="container mx-auto px-4 py-12">
        @if(session('success'))
            <div class="alert alert-success mb-6">
                {{ session('success') }}
            </div>
        @endif
        
        {{ $slot }}
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="bg-gradient-to-r from-violet-900 via-purple-900 to-indigo-900 backdrop-blur-lg border-b border-white/10 p-6">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Administration</h1>
            <div class="flex gap-6 items-center">
                <a href="{{ route('admin.projects.index') }}" class="nav-link">Projets</a>
                <a href="{{ route('admin.skills.index') }}" class="nav-link">Compétences</a>
                <a href="{{ route('admin.contacts.index') }}" class="nav-link">Messages</a>
                
                {{-- Bouton de déconnexion --}}
                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="nav-link hover:text-red-400 transition-colors">
                        🔓 Déconnexion
                    </button>
                </form>
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
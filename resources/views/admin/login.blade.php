<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900">
    
    <div class="glass p-8 max-w-md w-full mx-4">
        <h1 class="text-4xl font-bold text-center mb-8 bg-gradient-to-r from-violet-400 to-purple-400 bg-clip-text text-transparent">
            🔐 Connexion Admin
        </h1>

        {{-- Messages de succès --}}
        @if(session('success'))
            <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Messages d'erreur --}}
        @if(session('error'))
            <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded-lg mb-6">
                {{ session('error') }}
            </div>
        @endif

        {{-- Erreurs de validation --}}
        @if($errors->any())
            <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded-lg mb-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulaire de connexion --}}
        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="password" class="label">Mot de passe</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="input-field" 
                    placeholder="Entrez le mot de passe admin"
                    autofocus
                >
            </div>

            <button type="submit" class="btn btn-primary w-full">
                Se connecter
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-violet-400 hover:text-violet-300 transition-colors">
                ← Retour à l'accueil
            </a>
        </div>
    </div>

</body>
</html>
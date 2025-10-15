<x-admin-layout>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold">Gestion des Compétences</h1>
        <a href="{{ route('skills.create') }}" class="btn btn-primary">
            Ajouter une compétence
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($skills as $skill)
            <div class="glass p-6">
                <h3 class="text-xl font-bold text-purple-300 mb-2">{{ $skill->name }}</h3>
                <p class="text-gray-300 mb-2">Niveau : {{ $skill->level }}</p>
                @if($skill->category)
                    <p class="text-sm text-gray-400 mb-4">Catégorie : {{ $skill->category }}</p>
                @endif
                <div class="flex gap-4">
                    <a href="{{ route('skills.edit', $skill) }}" class="btn btn-secondary text-sm">
                        Modifier
                    </a>
                    <form action="{{ route('skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger text-sm">Supprimer</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-400 text-center py-8 col-span-full">Aucune compétence pour le moment.</p>
        @endforelse
    </div>
</x-admin-layout>
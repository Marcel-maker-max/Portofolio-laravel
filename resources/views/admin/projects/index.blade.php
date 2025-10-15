<x-admin-layout>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold">Gestion des Projets</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">
            Ajouter un projet
        </a>
    </div>

    <div class="grid grid-cols-1 gap-6">
        @forelse($projects as $project)
            <div class="glass p-6 flex justify-between items-center">
                <div>
                    <h3 class="text-2xl font-bold text-purple-300 mb-2">{{ $project->title }}</h3>
                    <p class="text-gray-300">{{ Str::limit($project->description, 100) }}</p>
                    <p class="text-sm text-gray-400 mt-2">Technologies : {{ $project->technologies }}</p>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-secondary">
                        Modifier
                    </a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-400 text-center py-8">Aucun projet pour le moment.</p>
        @endforelse
    </div>
</x-admin-layout>
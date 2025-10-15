<x-layout>
    <div class="max-w-4xl mx-auto">
        <a href="{{ route('projects.index') }}" class="text-purple-400 hover:text-purple-300 mb-6 inline-block">
            ← Retour aux projets
        </a>

        <div class="glass p-8 fade-in">
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-96 object-cover rounded-2xl mb-8">
            @endif

            <h1 class="text-4xl md:text-5xl font-black mb-6">{{ $project->title }}</h1>

            <div class="prose prose-invert max-w-none mb-8">
                <p class="text-gray-300 text-lg leading-relaxed">{{ $project->description }}</p>
            </div>

            @if($project->technologies)
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-purple-300 mb-4">Technologies utilisées</h2>
                    <div class="flex flex-wrap gap-3">
                        @foreach(explode(',', $project->technologies) as $tech)
                            <span class="px-4 py-2 bg-gradient-to-r from-purple-500/30 to-pink-500/30 text-purple-200 rounded-lg font-semibold">
                                {{ trim($tech) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($project->url)
                <div class="mt-8">
                    <a href="{{ $project->url }}" target="_blank" class="btn btn-primary">
                        🚀 Voir le projet en ligne
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-layout>

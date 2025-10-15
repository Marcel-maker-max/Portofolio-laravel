@props(['project'])

<div class="card p-6 fade-in">
    @if($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover rounded-xl mb-4">
    @endif
    <h3 class="text-2xl font-bold text-purple-300 mb-3">{{ $project->title }}</h3>
    <p class="text-gray-300 mb-4">{{ Str::limit($project->description, 150) }}</p>
    
    @if($project->technologies)
        <div class="flex flex-wrap gap-2 mb-4">
            @foreach(explode(',', $project->technologies) as $tech)
                <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-sm">
                    {{ trim($tech) }}
                </span>
            @endforeach
        </div>
    @endif
    
    <div class="flex gap-3">
        @if($project->url)
            <a href="{{ $project->url }}" target="_blank" class="btn btn-primary text-sm">
                Voir en ligne
            </a>
        @endif
        <a href="{{ route('projects.show', $project) }}" class="btn btn-secondary text-sm">
            Détails
        </a>
    </div>
</div>


<x-layout>
    <h1 class="section-title">Mes Projets</h1>
    <div class="grid ...">
        @foreach($projects as $project)
            <x-project-card :project="$project" />
        @endforeach
    </div>
</x-layout>
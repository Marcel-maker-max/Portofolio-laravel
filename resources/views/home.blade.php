<x-layout>
    <div class="mb-16 fade-in">
        <h1 class="section-title">Portfolio Professionnel</h1>
        <p class="text-center text-gray-300 text-xl max-w-3xl mx-auto mb-12">
            Découvrez mes projets récents et mes compétences techniques
        </p>
    </div>

    <section class="mb-20 fade-in">
        <h2 class="text-4xl font-bold text-center mb-12 text-gradient">Projets Récents</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
                <x-project-card :project="$project" />
            @empty
                <p class="text-gray-400 text-center col-span-full py-12">
                    Aucun projet pour le moment.
                </p>
            @endforelse
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('projects.index') }}" class="btn btn-primary">
                Voir tous les projets
            </a>
        </div>
    </section>

    <section class="mb-20 fade-in-delay">
        <h2 class="text-4xl font-bold text-center mb-12 text-gradient">Mes Compétences</h2>
        
        @php
            $groupedSkills = $skills->groupBy('category');
        @endphp

        @forelse($groupedSkills as $category => $categorySkills)
            <div class="glass p-8 mb-8">
                <h3 class="text-2xl font-bold text-purple-300 mb-6">
                    {{ $category ?: 'Autres compétences' }}
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($categorySkills as $skill)
                        <div class="mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-lg font-semibold text-white">{{ $skill->name }}</span>
                                <span class="text-sm font-bold text-purple-400">{{ $skill->level }}</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-progress" style="width: {{ $skill->level === 'Expert' ? '95%' : ($skill->level === 'Avancé' ? '80%' : ($skill->level === 'Intermédiaire' ? '60%' : '40%')) }}"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="glass p-12 text-center">
                <p class="text-gray-400 text-lg">Aucune compétence ajoutée pour le moment.</p>
            </div>
        @endforelse
    </section>

    <section class="text-center glass p-12 fade-in">
        <h2 class="text-4xl font-bold mb-6 text-gradient">Travaillons Ensemble</h2>
        <p class="text-gray-300 text-xl mb-8 max-w-2xl mx-auto">
            Vous avez un projet en tête ? Contactez-moi pour en discuter !
        </p>
        <a href="{{ route('contact.show') }}" class="btn btn-primary btn-lg">
            Me Contacter
        </a>
    </section>
</x-layout>

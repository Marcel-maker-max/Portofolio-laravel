<x-admin-layout>
    <h1 class="text-4xl font-bold mb-8">Ajouter une Compétence</h1>

    <form action="{{ route('admin.skills.store') }}" method="POST" class="glass p-8 max-w-2xl">
        @csrf

        <div class="mb-6">
            <label for="name" class="label">Nom de la compétence</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="input-field @error('name') border-red-500 @enderror" placeholder="Laravel">
            @error('name')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="level" class="label">Niveau</label>
            <input type="text" id="level" name="level" value="{{ old('level') }}" class="input-field @error('level') border-red-500 @enderror" placeholder="Expert, Intermédiaire, Débutant">
            @error('level')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="category" class="label">Catégorie (optionnel)</label>
            <input type="text" id="category" name="category" value="{{ old('category') }}" class="input-field @error('category') border-red-500 @enderror" placeholder="Backend, Frontend, Database">
            @error('category')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-4">
            <button type="submit" class="btn btn-primary">Créer la compétence</button>
            <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</x-admin-layout>
<x-admin-layout>
    <h1 class="text-4xl font-bold mb-8">Ajouter un Projet</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="glass p-8 max-w-2xl">
        @csrf

        <div class="mb-6">
            <label for="title" class="label">Titre du projet</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="input-field @error('title') border-red-500 @enderror">
            @error('title')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="label">Description</label>
            <textarea id="description" name="description" rows="5" class="textarea-field @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="technologies" class="label">Technologies (séparées par des virgules)</label>
            <input type="text" id="technologies" name="technologies" value="{{ old('technologies') }}" class="input-field @error('technologies') border-red-500 @enderror" placeholder="Laravel, Vue.js, Tailwind">
            @error('technologies')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="url" class="label">URL du projet (optionnel)</label>
            <input type="url" id="url" name="url" value="{{ old('url') }}" class="input-field @error('url') border-red-500 @enderror" placeholder="https://example.com">
            @error('url')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="label">Image (optionnel)</label>
            <input type="file" id="image" name="image" class="input-field @error('image') border-red-500 @enderror">
            @error('image')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-4">
            <button type="submit" class="btn btn-primary">Créer le projet</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</x-admin-layout>

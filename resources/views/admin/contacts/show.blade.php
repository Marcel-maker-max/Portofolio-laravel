<x-admin-layout>
    <div class="mb-8">
        <a href="{{ route('contacts.admin') }}" class="text-purple-400 hover:text-purple-300 mb-4 inline-block">
            ← Retour aux messages
        </a>
    </div>

    <div class="glass p-8 max-w-3xl">
        <div class="mb-6 pb-6 border-b border-purple-500/30">
            <h1 class="text-3xl font-bold text-purple-300 mb-4">{{ $contact->subject }}</h1>
            <div class="flex flex-wrap gap-6 text-gray-300">
                <div>
                    <span class="text-purple-400 font-semibold">De :</span> {{ $contact->name }}
                </div>
                <div>
                    <span class="text-purple-400 font-semibold">Email :</span> 
                    <a href="mailto:{{ $contact->email }}" class="text-blue-400 hover:text-blue-300">
                        {{ $contact->email }}
                    </a>
                </div>
                <div>
                    <span class="text-purple-400 font-semibold">Date :</span> {{ $contact->created_at->format('d/m/Y à H:i') }}
                </div>
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-xl font-bold text-purple-300 mb-4">Message :</h2>
            <div class="bg-slate-800/50 p-6 rounded-xl text-gray-300 leading-relaxed whitespace-pre-wrap">{{ $contact->message }}</div>
        </div>

        <div class="flex gap-4">
            <a href="mailto:{{ $contact->email }}" class="btn btn-primary">
                📧 Répondre par email
            </a>
            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Supprimer</button>
            </form>
        </div>
    </div>
</x-admin-layout>

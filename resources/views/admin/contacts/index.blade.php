<x-admin-layout>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold">Messages de Contact</h1>
        <span class="text-lg text-purple-300">{{ $contacts->count() }} message(s)</span>
    </div>

    <div class="grid grid-cols-1 gap-6">
        @forelse($contacts as $contact)
            <div class="glass p-6 flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center gap-4 mb-3">
                        <h3 class="text-xl font-bold text-purple-300">{{ $contact->name }}</h3>
                        <span class="text-sm text-gray-400">{{ $contact->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-gray-300 mb-2">
                        <span class="text-purple-400 font-semibold">Email :</span> {{ $contact->email }}
                    </p>
                    <p class="text-gray-300 mb-3">
                        <span class="text-purple-400 font-semibold">Sujet :</span> {{ $contact->subject }}
                    </p>
                    <p class="text-gray-400 text-sm">
                        {{ Str::limit($contact->message, 150) }}
                    </p>
                </div>
                <div class="flex gap-4 ml-6">
                    <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-secondary">
                        Voir
                    </a>
                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="glass p-16 text-center">
                <p class="text-gray-400 text-xl">Aucun message pour le moment.</p>
            </div>
        @endforelse
    </div>
</x-admin-layout>

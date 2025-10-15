<x-layout>
    <h1 class="text-3xl md:text-4xl font-bold text-blue-500 text-center mb-6">Contact</h1>

    @if(session('success'))
        <div class="mb-4 rounded border border-green-400 bg-green-100 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST" class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border rounded @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border rounded @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Sujet</label>
            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="w-full px-4 py-2 border rounded @error('subject') border-red-500 @enderror">
            @error('subject')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
            <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border rounded @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
            @error('message')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn">Envoyer</button>
    </form>
</x-layout>

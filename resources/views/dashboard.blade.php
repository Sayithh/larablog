<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <!-- Message flash -->
    @if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg mt-6 mb-6 text-center">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="bg-red-500 text-white p-4 rounded-lg mt-6 mb-6 text-center">
        {{ session('error') }}
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
                <!-- Articles -->
            @foreach ($articles as $article)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
                        <p class="text-gray-700">{{ substr($article->content, 0, 30) }}...</p>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('articles.edit', $article->id) }}" class="text-red-500 hover:text-red-700">Modifier</a>
                        <a href="{{ route('articles.remove', $article->id) }}" class="text-red-500 hover:text-red-700">Supprimer</a>
                    </div>
                </div>
            @endforeach
            
        </div>

    </div>

        
</x-app-layout>

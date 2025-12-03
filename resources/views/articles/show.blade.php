<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $article->title }}</h1>
                    <p class="mt-2 text-sm text-gray-600">Published on {{ $article->published_at ? $article->published_at->format('F j, Y') : 'N/A' }}</p>
                    @if($article->image_url)
                        <div class="mt-6">
                            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-64 object-cover rounded-lg">
                        </div>
                    @endif
                    <div class="mt-6 prose max-w-none">
                        @foreach(explode("\n", $article->content) as $paragraph)
                            @if(trim($paragraph))
                                <p>{{ trim($paragraph) }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

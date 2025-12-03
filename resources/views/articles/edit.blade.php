<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('articles.update', $article) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-label for="title" value="{{ __('Title') }}" />
                            <x-input id="title" type="text" class="mt-1 block w-full" name="title" :value="old('title', $article->title)" required autofocus autocomplete="title" />
                            <x-input-error for="title" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-label for="content" value="{{ __('Content') }}" />
                            <textarea id="content" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="content" rows="10" required>{{ old('content', $article->content) }}</textarea>
                            <x-input-error for="content" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-label for="image_url" value="{{ __('Image URL') }}" />
                            <x-input id="image_url" type="url" class="mt-1 block w-full" name="image_url" :value="old('image_url', $article->image_url)" autocomplete="image_url" />
                            <x-input-error for="image_url" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-label for="published_at" value="{{ __('Published At') }}" />
                            <x-input id="published_at" type="datetime-local" class="mt-1 block w-full" name="published_at" :value="old('published_at', $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '')" />
                            <x-input-error for="published_at" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-secondary-button onclick="window.history.back()">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-button class="ml-3">
                                {{ __('Update Article') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

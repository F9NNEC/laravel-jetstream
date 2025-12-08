<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900">Welcome, User!</h3>
                    <p class="mt-2 text-sm text-gray-600">Halooooooooo.</p>
                </div> --}}
                
                <x-welcome />

                @if($newest_articles->count() > 0)
                <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 relative">
                    <div class="grid grid-cols-1 sm:grid-cols-12 gap-5">
                        @if($newest_articles->count() >= 1)
                        <div class="sm:col-span-5">
                            @php $article = $newest_articles->first(); @endphp
                            <a href="{{ route('articles.show', $article) }}">
                                <div class="bg-cover text-center overflow-hidden"
                                    style="min-height: 300px; background-image: url('{{ $article->image_url ?: 'https://api.time.com/wp-content/uploads/2020/07/never-trumpers-2020-election-01.jpg?quality=85&w=1201&h=676&crop=1' }}')"
                                    title="Article Image">
                                </div>
                            </a>
                            <div
                                class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                                <div class="">
                                    <a href="{{ route('articles.show', $article) }}"
                                        class="text-xs text-indigo-600 uppercase font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                                        Article
                                    </a>
                                    <a href="{{ route('articles.show', $article) }}"
                                        class="block text-gray-900 font-bold text-2xl mb-2 hover:text-indigo-600 transition duration-500 ease-in-out">{{ $article->title }}</a>
                                    <p class="text-gray-700 text-base mt-2">{{ Str::limit($article->content, 150) }}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="sm:col-span-7 grid grid-cols-2 lg:grid-cols-3 gap-5">
                            @foreach($newest_articles->skip(1)->take(6) as $article)
                            <div class="">
                                <a href="{{ route('articles.show', $article) }}">
                                    <div class="h-40 bg-cover text-center overflow-hidden"
                                        style="background-image: url('{{ $article->image_url ?: 'https://api.time.com/wp-content/uploads/2020/07/president-trump-coronavirus-election.jpg?quality=85&w=364&h=204&crop=1' }}')"
                                        title="Article Image">
                                    </div>
                                </a>
                                <a href="{{ route('articles.show', $article) }}"
                                    class="text-gray-900 inline-block font-semibold text-md my-2 hover:text-indigo-600 transition duration-500 ease-in-out">{{ $article->title }}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @foreach($older_articles as $article)
                <div class="py-12 sm:px24 lg:px-32">
                    <article class="relative overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg hover:scale-105 duration-300 ">
                        <img alt="" src="{{ $article->image_url ?: 'https://images.unsplash.com/photo-1661956602116-aa6865609028?auto=format&amp;fit=crop&amp;q=80&amp;w=1160' }}" class="absolute inset-0 h-full w-full object-cover">

                        <div class="relative bg-linear-to-t from-gray-900/50 to-gray-900/25 pt-32 sm:pt-48 lg:pt-64">
                            <div class="p-4 sm:p-6">
                            <time datetime="{{ $article->published_at ? $article->published_at->format('Y-m-d') : now()->format('Y-m-d') }}" class="block text-xs text-white/90" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);"> {{ $article->published_at ? $article->published_at->format('jS M Y') : now()->format('jS M Y') }} </time>

                            <a href="{{ route('articles.show', $article) }}">
                                <h3 class="mt-0.5 text-lg text-white hover:text-indigo-500" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5); font-weight: bold;">{{ $article->title }}</h3>
                            </a>

                            <p class="mt-2 line-clamp-3 text-sm/relaxed text-white/95" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                {{ Str::limit($article->content, 150) }}
                            </p>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>

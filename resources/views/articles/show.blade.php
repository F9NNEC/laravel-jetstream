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

                    <!-- Comments Section -->
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-900">Comments</h3>

                        @auth
                            <!-- Comment Form -->
                            <form action="{{ route('articles.comments.store', $article) }}" method="POST" class="mt-4">
                                @csrf
                                <div>
                                    <label for="comment" class="block text-sm font-medium text-gray-700">Add a comment</label>
                                    <textarea id="comment" name="comment" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Write your comment here..."></textarea>
                                    @error('comment')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Post Comment
                                    </button>
                                </div>
                            </form>
                        @else
                            <p class="mt-4 text-gray-600">Please <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">log in</a> to leave a comment.</p>
                        @endauth

                        <!-- Display Comments -->
                        <div class="mt-6 space-y-4">
                            @forelse($article->comments as $comment)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center">
                                                <span class="text-white text-sm font-medium">{{ substr($comment->user->name, 0, 1) }}</span>
                                            </div>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">{{ $comment->user->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <p class="text-gray-700">{{ $comment->comment }}</p>
                                    </div>
                                    @auth
                                        <div class="mt-2 flex space-x-2">
                                            @if(Auth::id() === $comment->user_id)
                                                <a href="{{ route('comments.edit', $comment) }}" class="text-indigo-600 hover:text-indigo-900 text-sm">Edit</a>
                                            @endif
                                            @if(Auth::id() === $comment->user_id || Auth::user()->role === 'admin')
                                                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this comment?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                    @endauth
                                </div>
                            @empty
                                <p class="text-gray-500">No comments yet. Be the first to comment!</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

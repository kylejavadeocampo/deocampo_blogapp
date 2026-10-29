<!-- HEADER -->
<div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
        {{ __('Blog Posts')}}
    </h1>

    <a href="{{ route('posts.create') }}">
        <x-primary-button>
            {{ __('Create New Post') }}
        </x-primary-button>
    </a>
</div>
<hr>

@if (session('success'))
    <div class="mb-6 p-4 text-sm text-green-800 bg-green-100 dark:bg-green-900/30 dark:text-green-400 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<br>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($posts as $post)
        <div class="bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-lg p-5 flex flex-col justify-between shadow-sm">
            
            <!-- CONTENT -->
            <div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">
                    {{ $post -> title }}
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                    {{$post->body}}
                </p>
            </div>

            <!-- BUTTONS -->
            <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex items-center justify between">
                <div class="flex items-center space-x-3 text-sm">
                    <a href=" {{ route('posts.show', $post->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline font-medium">
                        View
                    </a>
                    <a href=" {{ route('posts.edit', $post->id) }}" class="text-gray-600 dark:text-gray-400 hover:underline font-medium">
                        Edit
                    </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-600 dark:text-red-400 hover:underline font-medium">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    @endforeach
</div>
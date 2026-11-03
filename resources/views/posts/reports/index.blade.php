<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog Post Reports') }}
        </h2>
    </x-slot>   

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900 dark:text-gray-100">

                    <p>Filter your blog posts and download a PDF or CSV report.</p>

                    @if ($errors->any())
                        <div class="mt-4 p-4 text-sm text-red-800 bg-red-100 dark:bg-red-900/30 dark:text-red-400 rounded-lg">
                            <strong>Please correct the following:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form
                        action="{{ route('posts.reports.index') }}"
                        method="GET"
                        class="mt-4 space-y-4"
                    >   
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div>
                                <x-input-label for="title" :value="__('Start Date')" />
                                <x-text-input id="start_date" name="start_date" type="date" class="mt-1 block"/>
                            </div>
                    
                            <div>
                                <x-input-label for="title" :value="__('End Date')" />
                                <x-text-input id="end_date" name="end_date" type="date" class="mt-1 block"/>
                            </div>
                        </div>
                
                        <div>
                            <x-primary-button>
                                {{ __('Generate Report') }}
                            </x-primary-button>

                            <a href="{{ route('posts.reports.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 ms-5">
                                {{ __('Reset Filters') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p>
                                <strong>Period:</strong>
                                {{ $startDate ?: 'Beginning' }}
                                to
                                {{ $endDate ?: 'Present' }}
                            </p>
                        
                            <h1 class="text-xl">Total Posts: {{ $totalPosts }}</h1>
                        </div>
                    
                        <div>
                            <x-link-button :href="route('posts.reports.pdf', [
                                'start_date'    => $startDate,
                                'end_date'      => $endDate
                            ])">
                                {{ __('Export PDF') }}
                            </x-link-button>

                            <x-link-button variant="secondary" :href="route('posts.reports.pdf', [
                                'start_date'    => $startDate,
                                'end_date'      => $endDate
                            ])">
                                {{ __('Export CSV')}}
                            </x-link-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-table>
                        <x-slot:head>
                            <x-table.heading>ID</x-table.heading>
                            <x-table.heading>Title</x-table.heading>
                            <x-table.heading>Body</x-table.heading>
                            <x-table.heading>Created Date</x-table.heading>
                        </x-slot:head>

                        @forelse ($posts as $post)
                            <x-table.row>
                                <x-table.cell>
                                    {{ $post -> id }}
                                </x-table.cell>
                                <x-table.cell>
                                    {{ $post -> title }}
                                </x-table.cell>
                                <x-table.cell>
                                    {{ \Illuminate\Support\Str::limit($post->body, 100) }}
                                </x-table.cell>
                                <x-table.cell>
                                    {{ $post->created_at->format('M d, Y') }}
                                </x-table.cell>
                            </x-table.row>
                        @empty
                            <x-table.row>
                                <x-table.cell colspan="4" class="text-center">
                                    No posts found for the selected dates
                                </x-table.cell>
                            </x-table.row>
                        @endforelse
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
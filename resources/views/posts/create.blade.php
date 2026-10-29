<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-right">
            {{ __('Create Posts') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('posts.store') }}" class="space-y-6">
                        @csrf

                        <!-- TITLE -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block"/>
                        </div>

                        <!-- BODY -->
                        <div>
                            <x-input-label for="body" :value="__('Body')"/>
                            <textarea name="body" class="mt-1 block 
                                                         border-gray-300 
                                                         dark:border-gray-700 
                                                         dark:bg-gray-900
                                                         dark:text-gray-300
                                                         focus:border-indigo-500
                                                         dark:focus:border-indigo-600
                                                         focus:ring-indigo-500
                                                         dark:focus:ring-indigo-600
                                                         rounded-md
                                                         shadow-sm
                                                         " rows="5" required>
                            </textarea>
                        </div>


                        <div>
                            <x-primary-button> {{ __('Save') }} </x-primary-button>
                            <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 ms-5">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Game List' }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ 'Game List' }}
                </div>
                <x-table.table 
                :rows="$games"
                :fields="['id','name', 'publisher->name', 'genres', 'actions']"
                :headers="['#', 'Name', 'Publisher', 'Genres', 'Actions']"
                searchPlaceholder="Search Games"
                :searchRoute="route('games.index')"
                :actions="['games.show'=> 'View Details', 'games.edit' => 'Edit', 'games.destroy' => 'Delete']"
                />
            </div>
        </div>
    </div>

    <div class="px-4 py-3">
        <a href="{{ route('games.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-wider hover:bg-gray-700 dark:hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            {{ __('Create Game') }}
        </a>
    </div>
</x-app-layout>
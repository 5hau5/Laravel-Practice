<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Game Details' }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Name:</label>
                        <p id="name" class="text-gray-700 dark:text-gray-300">{{ $game->name }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Description:</label>
                        <p id="description" class="text-gray-700 dark:text-gray-300">{{ $game->description }}</p>
                    </div>
                </div>
                <x-buttons.button1 href="{{ route('games.edit', $game->id) }}" text="Edit Game" />
            </div>
        </div>
    </div>
</x-app-layout>
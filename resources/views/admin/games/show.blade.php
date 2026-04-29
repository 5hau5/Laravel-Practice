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
                    <div class="mb-4">
                        <label for="published_date" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Published Date:</label>
                        <p id="published_date" class="text-gray-700 dark:text-gray-300">{{ $game->published_date }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="publisher" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Publisher:</label>
                        <p id="publisher" class="text   -gray-700 dark:text-gray-300">{{ $game->publisher }}</p>
                </div>
                <div class="flex justify-center">
                    <x-buttons.button1 href="{{ route('games.edit', $game->id) }}" text="Edit Game" />
                    <x-buttons.button1 href="{{ route('games.index') }}" text="Back to List" class="ml-4" />
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>
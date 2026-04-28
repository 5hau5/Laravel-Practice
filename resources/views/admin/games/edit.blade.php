<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Edit Game' }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('games.update', $game->id) }}" class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $game->name }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Description:</label>
                    <textarea id="description" name="description" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline">{{ $game->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="published_date" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Published Date:</label>
                    <input type="date" id="published_date" name="published_date" value="{{ $game->published_date }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="publisher" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Publisher:</label>
                    <input type="text" id="publisher" name="publisher" value="{{ $game->publisher }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="genres" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Genres:</label>
                    <select id="genres" name="genres[]" multiple class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" {{ $game->genres->contains($genre->id) ? 'selected' : '' }}>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-blue-50 hover:bg-blue-7  focus:outline-none focus:ring-blue active:bg-blue-light">Update Game</button>
            </form>
        </div>
    </div>  
</x-app-layout>
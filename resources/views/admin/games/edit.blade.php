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
                    <input type="text" id="name" name="name" value="{{ old('name', $game->name) }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Description:</label>
                    <textarea id="description" name="description" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline">{{ old('description', $game->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="published_date" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Published Date:</label>
                    <input type="date" id="published_date" name="published_date" value="{{ old('published_date', \Carbon\Carbon::parse($game->published_date)->format('Y-m-d')) }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                    @error('published_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="publisher" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Publisher:</label>
                    <input type="text" id="publisher" name="publisher" value="{{ old('publisher', $game->publisher) }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                    @error('publisher')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="genres" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Genres:</label>
                    @php
                        $selectedItems = old('genres', $game->genres->pluck('id')->toArray());
                    @endphp
                    <select id="genres" name="genres[]" multiple class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" {{ in_array($genre->id, $selectedItems) ? 'selected' : '' }}>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    @error('genres')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-center">
                    <div class="px-4 py-3">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-wider hover:bg-gray-700 dark:hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Update Game</button>
                    </div>
                    <x-buttons.button1 href="{{ route('games.index') }}" text="Back to List" class="ml-4" />
                </div>
            </form>
        </div>
    </div>  
</x-app-layout>
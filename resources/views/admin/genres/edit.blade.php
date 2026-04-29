<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Edit Genre' }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('genres.update', $genre->id) }}" class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $genre->name }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Description:</label>
                    <textarea id="description" name="description" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline">{{ $genre->description }}</textarea>
                </div>
                                <div class="flex justify-center">
                    <div class="px-4 py-3">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-wider hover:bg-gray-700 dark:hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Update Game</button>
                    </div>
                    <x-buttons.button1 href="{{ route('genres.index') }}" text="Back to List" class="ml-4" />
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
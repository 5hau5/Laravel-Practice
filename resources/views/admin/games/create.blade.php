<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Create Game' }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ 'Create Game' }}
                </div>
                <form method="POST" action="{{ route('games.store') }}" class="p-6 flex">
                    @csrf
                    <div class="flex flex-grow p-4">
                        <div class="flex flex-col w-3/4">
                            <div class="flex flex-col flex-grow">
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Name:</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline w-full">
                                </div>
                                <div class="mb-4 flex-grow">
                                    <label for="description" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Description:</label>
                                    <textarea id="description" name="description" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline w-full h-full">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="flex space-x-4 mt-6">
                                <div class="w-1/2">
                                    <label for="published_date" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Published Date:</label>
                                    <input type="date" id="published_date" name="published_date" value="{{ old('published_date') }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline w-full">
                                </div>
                                <div class="w-1/2">
                                    <label for="publisher" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Publisher:</label>
                                    <input type="text" id="publisher" name="publisher" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline w-full">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col w-1/4">
                        <div class="mb-6 flex-grow">
                            <label for="genres" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Genres:</label>
                            <select id="genres" name="genres[]" multiple class="shadow appearance-none border rounded py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 focus:outline-none focus:shadow-outline w-full h-full">
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}" {{ isset($selectedItems) && in_array($genre->id, $selectedItems) ? 'selected' : '' }}>{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="px-4 py-3 flex space-x-4" mt-6>
                            <button type="submit" class="px-8 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-wider hover:bg-gray-700 dark:hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 w-full">Create Game</button>
                            <x-buttons.button1 href="{{ route('games.index') }}" text="Back to List" class="ml-4" /> 
                        </div>

                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Publisher Details' }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Name:</label>
                        <p id="name" class="text-gray-700 dark:text-gray-300">{{ $publisher->name }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Description:</label>
                        <p id="description" class="text-gray-700 dark:text-gray-300">{{ $publisher->description }}</p>
                    </div>

                    <div class="flex justify-center">
                        <x-buttons.button1 href="{{ route('publishers.edit', $publisher->id) }}" text="Edit Publisher" />
                        <x-buttons.button1 href="{{ route('publishers.index') }}" text="Back to List" class="ml-4" />
                        <x-confirm-action 
                            message="do u want to delete {{ $publisher->name }}?"   
                            confirmRoute="{{ route('publishers.destroy', $publisher->id) }}" 
                            cancelRoute="{{ url()->current() }}"
                            confirmMethod="DELETE" 
                            label="Delete Publisher" 
                        />
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

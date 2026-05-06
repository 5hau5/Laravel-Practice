<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Publisher List' }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ 'Publisher List' }}
                </div>
                <x-table.table 
                :rows="$publishers" 
                :fields="['id','name','description', 'actions']"
                :headers="['#', 'Name', 'Description', 'Actions']"
                searchPlaceholder="Search Publishers..." 
                :searchRoute="route('publishers.index')" 
                :actions="['publishers.show'=> 'View Details', 'publishers.edit' => 'Edit', 'publishers.destroy' => 'Delete']"
                />
            </div>
        </div>
    </div>

    <div class="px-4 py-3">
        <a href="{{ route('publishers.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-wider hover:bg-gray-700 dark:hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            {{ __('Create Publisher') }}
        </a>
    </div>

</x-app-layout>
@props(['message', 'confirmRoute', 'confirmMethod' => 'POST', 'label' => 'Delete'])

<div x-data="{ open: false }">
    
    <div class="px-4 py-3">
        <button @click="open = true" class="btn-danger inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-wider hover:bg-gray-700 dark:hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            {{ $label }}
        </button>
    </div>

    <div 
        x-show="open"
        class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 text-gray-100"
        x-cloak
    >
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
            <p class="mb-4">{{ $message }}</p>

            <div class="flex justify-end space-x-4">
                <button @click="open = false">Cancel</button>

                <form action="{{ $confirmRoute }}" method="POST">
                    @csrf
                    @method($confirmMethod)

                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">
                        Confirm
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
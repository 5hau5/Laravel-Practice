@props([
    'href',
    'text'
    ])

<div class="px-4 py-3">
    <a href="{{ $href }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-wider hover:bg-gray-700 dark:hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        {{ __($text) }}
    </a>
</div>
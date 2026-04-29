@props([
    'row', 
    'fields', 
    'href' => null,
    'text' => null
    ])

<tr class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg hover:bg-slate-50 hover:dark:bg-gray-600 border-b border-slate-200 dark:border-gray-800">
    @foreach ($fields as $field)
        <td class="p-4 py-5">
            <p class="text-sm text-gray-900 dark:text-gray-100 {{ $field === 'id' ? 'font-semibold' : '' }}">
                {{ $row -> $field }}
            </p>
        </td>
    @endforeach
    @if ($href)
        <td class="p-4 py-5">
            <x-buttons.button1 href="{{ $href }}" text="{{ $text }}" />
        </td>
    @endif
</tr>
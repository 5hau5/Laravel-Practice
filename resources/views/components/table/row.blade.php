@props([
    'row', 
    'fields', 
    'actions',
    ])



<tr class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg hover:bg-slate-50 hover:dark:bg-gray-600 border-b border-slate-200 dark:border-gray-800">
    @foreach ($fields as $field)
        @php
            $value = data_get($row, $field);
        @endphp
        
        <td class="p-4 py-5">
            @if ($field === 'id')
                <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                    {{ $value ?? '-' }}
                </p>
            @elseif (is_array($field) || $value instanceof \Illuminate\Support\Collection)
                <p class="text-sm text-gray-900 dark:text-gray-100">
                    {{ collect($value)->implode(', ') }}
                </p>               
            @else
                <p class="text-sm text-gray-900 dark:text-gray-100">
                    {{ $value ?? '-' }}
                </p>
            @endif
        </td>
    @endforeach
    <td class="p-4 py-5">
        @foreach ($actions as $route => $label)
            @if (str_contains($route, 'destroy'))
                <x-confirm-action 
                    message="do u really want to delete {{ $row->name }}?" 
                    confirmRoute="{{ route($route, $row->id) }}" 
                    cancelRoute="{{ url()->current() }}"
                    confirmMethod="DELETE"
                    label="Delete"
                />
            @else
                <x-buttons.button1 
                    href="{{ route($route, $row->id) }}" 
                    text="{{ $label }}" 
                />
            @endif
        @endforeach
    </td>

</tr>
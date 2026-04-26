@props(['list'])

@foreach ($list as $header)
    <th class="p-4 border-b border-slate-200 dark:border-gray-800 bg-slate-50 dark:bg-gray-700 overflow-hidden shadow-sm ">
        <p class="text-sm font-normal leading-none text-slate-500 dark:text-gray-300">
            {{ $header }}
        </p>
    </th>
@endforeach


@props([
    'rows', 
    'fields',
    'headers',
    'searchRoute',
    'searchPlaceholder',
    'actions',
    ]);

<div class="p-4 mx-auto">
    <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
        <div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100"">Games</h3>
            <p class="text-gray-900 dark:text-gray-100"">Overview of the current games.</p>
        </div>
        <x-search-box :searchRoute="$searchRoute" :searchPlaceholder="$searchPlaceholder" />
    </div>

    <div class="relative flex flex-col w-full h-full overflow-scrolltext-gray-900 dark:text-gray-100" bg-white shadow-md rounded-lg bg-clip-border">
    <table class="w-full text-left table-auto min-w-max rounded-lg">
        <thead> 
            <x-table.head :list="$headers"/>
        </thead>
        <tbody>
        @foreach ($rows as $row)
            <x-table.row :row="$row" :fields="$fields" :actions="$actions"/>
        @endforeach
        </tbody>
    </table>
    <div class=" px-4 py-3">
        {{ $rows->links() }}
    </div>
</div>
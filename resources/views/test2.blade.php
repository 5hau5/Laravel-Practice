<h1> aaaa</h1>


@php
    $nums = [1,2,34,5,6,7,8,9,0]
@endphp


@php
    $stuff = collect([
        [
            "id" => 1,
            "name" => "tree"
        ],
        [
            "id" => 2,
            "name" => "table"
        ],
        [
            "id" => 3,
            "name" => "cow"
        ]
    ])
@endphp

@foreach ( $nums as $num)
    <p>{{ $num }}</p>

    
@endforeach

@foreach ($stuff as $item)
    <p>{{ $item['name'] }}</p>
    <h2>{{ $item['id'] }}</h2>
    
@endforeach

{{ date('l') }}


<body>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="rounded-lg bg-black border-4 border-dashed border-gray-200 dark:border-gray-700 h-96 flex items-center justify-center">

            <h1>Test</h1>
        </div>
    </div>
</body>
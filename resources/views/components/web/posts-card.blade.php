@props(['post'])


<div {{ $attributes -> merge(['class' => 'rounded-lg bg-gray-100 px-8 py-6 shadow-lg mb-5']) }}>
    <div class="flex flex-row justify-between mb-4 items-center">
        <a href="#" class="rounded-lg bg-slate-200 text-sky-300 px-4 py-2 text-sm font-medium hover:bg-slate-300">{{ $post['category'] }}</a>
        <div class="flex flex-row space-x-2 text-neutral-500">
            <a href="#" class="hover:text-sky-200 ease-in duration-200">{{ $post['author'] }}</a>
            <div>|</div>
            <div>{{ $post['post_date'] }}</div>
        </div>
    </div>
    <div class="font-medium text-neutral-600 leading-6 mb-6">
        {{ $post['post_title'] }}
    </div>
    <div class="text-neutral-500 leading-6 mb-6">
        {{ $post['post_content'] }}
    </div>
</div>

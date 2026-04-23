
<x-layouts.web>
    <div class="rounded-lg p-6 bg-slate-400 text-white">{{ "POSTS" }}</div>
    @foreach ($posts as $post)
        <x-web.posts-card :post="$post" class="rounded-lg" />
    @endforeach
</x-layouts.web>
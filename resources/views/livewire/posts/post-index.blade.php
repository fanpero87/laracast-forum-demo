<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold">Posts</h1>
    <ul class="p-4 divide-y">
        @foreach($this->posts as $post)
        <li wire:key="{{ $post->id }}" class="px-2 py-4">
            <flux:link :href="route('posts.show', [$post->id, Str::slug($post->title)])" wire:navigate>
                <span class="text-lg font-bold group-hover:underline">{{ $post->title }}</span>
                <span class="text-xs text-zinc-600 dark:text-white">{{ $post->created_at->diffForHumans() }} by {{
                    $post->user->name }}</span>
            </flux:link>
        </li>
        @endforeach
    </ul>
    <div class="p-4">
        {{ $this->posts->links() }}
    </div>
</div>

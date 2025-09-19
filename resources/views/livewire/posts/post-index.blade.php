<div class="container mx-auto mt-8">

    <div class="flex w-1/6 space-x-2">
        <flux:button :href="route('posts.index')" wire:navigate>All Posts</flux:button>
        @foreach($this->topics as $topic)
        <flux:button wire:key="{{ $topic->id }}" :href="route('posts.index', [$topic->slug])" wire:navigate>{{
            $topic->name }}</flux:button>
        @endforeach
    </div>

    <h1 class="mt-4 text-2xl font-bold">Posts</h1>
    <ul class="p-4 divide-y">
        @foreach($this->posts as $post)
        <li wire:key="{{ $post->id }}" class="flex items-center justify-between px-2 py-6">
            <div class="flex flex-col space-y-2">
                <flux:link :href="route('posts.show', [$post->id, Str::slug($post->title)])" variant="ghost"
                    class="text-lg font-bold" wire:navigate>
                    {{ $post->title }}
                </flux:link>
                <flux:text class="text-xs text-zinc-600 dark:text-white">
                    {{ $post->created_at->diffForHumans() }} by {{$post->user->name }}
                </flux:text>
            </div>
            <flux:button :href="route('posts.index', [$post->topic->slug])" wire:navigate>{{ $post->topic->name }}
            </flux:button>
        </li>
        @endforeach
    </ul>
    <div class="p-4">
        {{ $this->posts->links() }}
    </div>
</div>

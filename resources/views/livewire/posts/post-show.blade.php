<div class="container p-4 mx-auto">
    
@if($post->topic)
    <flux:button wire:key="{{ $post->topic->id }}" :href="route('posts.index', [$post->topic->slug])" wire:navigate>{{
                $post->topic->name }}</flux:button>
@endif
            
    <h1 class="mt-4 text-2xl font-bold text-zinc-600 dark:text-white">{{ $this->post->title }}</h1>
    <span class="text-xs text-zinc-600 dark:text-white">{{ optional($this->post->created_at)->diffForHumans() }} by
        {{ optional($this->post->user)->name }}</span>
    <div class="mt-6 prose-sm prose max-w-none text-zinc-600 dark:text-white/70">
        {{$this->post->html}}
    </div>

    <div>
        <h2 class="my-4 text-xl font-bold text-zinc-600 dark:text-white">Comments</h2>
        @auth
        <livewire:comments.comment-store :post="$this->post" />
        @endauth

        <ul class="divide-y">
            @foreach ($this->comments as $comment)
            <li class="grid px-2 py-4" wire:key="comment-{{ $comment->id }}">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <span class="text-zinc-600 dark:text-white/70">{{ $comment->body }}</span>
                        <span class="block mt-1 text-xs text-zinc-600 dark:text-white/70">By {{ $comment->user->name }}
                            {{ optional($comment->created_at)->diffForHumans() }} </span>
                    </div>
                    @can('update', $comment->resource)
                    <div class="ml-2">
                        <livewire:comments.comment-update :comment="$comment->resource"
                            wire:key="update-{{ $comment->resource->id }}" />
                    </div>
                    @endcan
                    @can('delete', $comment->resource)
                    <div class="ml-2">
                        <livewire:comments.comment-delete :comment="$comment->resource"
                            wire:key="delete-{{ $comment->resource->id }}" />
                    </div>
                    @endcan
                </div>
            </li>
            @endforeach
        </ul>

        {{ $this->comments->links() }}
    </div>
</div>

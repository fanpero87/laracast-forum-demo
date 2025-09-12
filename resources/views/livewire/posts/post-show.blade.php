<div class="p-4">
    <h1 class="text-2xl font-bold text-zinc-600 dark:text-white">{{ $this->post->title }}</h1>
<span class="text-xs text-zinc-600 dark:text-white">{{ optional($this->post->created_at)->diffForHumans() }} by
        {{ optional($this->post->user)->name }}</span>
    <article class="mt-6 text-zinc-600 dark:text-white/70">
        <pre class="font-sans whitespace-pre-wrap">{{ $this->post->body }}</pre>
    </article>

    <div class="px-4">
        <h2 class="mt-4 text-xl font-bold text-zinc-600 dark:text-white">Comments</h2>
        @auth
            <livewire:comments.comment-store :post="$this->post" />
        @endauth

        <ul class="p-4 divide-y">
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

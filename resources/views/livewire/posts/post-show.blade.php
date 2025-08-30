<div class="p-4">
    <h1 class="text-2xl font-bold text-zinc-600 dark:text-white">{{ $this->post->title }}</h1>
    <span class="text-xs text-zinc-600 dark:text-white">{{ $this->post->created_at->diffForHumans() }} by {{ $this->post->user->name }}</span>
    <article class="mt-6 text-zinc-600 dark:text-white/70">
        <pre class="font-sans whitespace-pre-wrap">{{ $this->post->body }}</pre>
    </article>
    
</div>

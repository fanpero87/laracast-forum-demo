<div class="">
     <h1 class="text-2xl font-bold">Posts</h1>
    <ul class="flex-col p-4 space-y-6">
        @foreach($this->posts as $post)
         <li>
            <span class="text-lg font-semibold">{{ $post->title }}</span>
        </li>
        @endforeach
     </ul>

    {{ $this->posts->links() }}
</div>

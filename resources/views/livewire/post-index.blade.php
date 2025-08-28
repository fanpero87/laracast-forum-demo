<div class="">
    <ul class="flex-col p-4 space-y-6">
        @foreach($this->posts as $post)
         <li>
            <span class="font-semibold text-lg">{{ $post->title }}</span>
        </li>
        @endforeach
     </ul>

    {{ $this->posts->links() }}
</div>

<div class="flex flex-col gap-6">
    <ul>
        @foreach($posts as $post)
         <li>{{ $post->title }}</li>
        @endforeach
     </ul>
</div>

<div x-data="{
		    value: '# Write a Post..',
		    init() {
		        let editor = new SimpleMDE({ element: this.$refs.editor })

		        editor.value(this.value)

		        editor.codemirror.on('change', () => {
		            this.value = editor.value()
		        })
		    },
		}" class="container mx-auto mt-8">
    <form method="POST" wire:submit="store" class="space-y-6">
        <h1 class="mt-4 text-2xl font-bold">Title</h1>
        <flux:input type="text" wire:model="title" required />
        <flux:textarea wire:model="body" rows="4" />
        <flux:error name="body" />

        <flux:select wire:model="topic_id" placeholder="Choose topic...">
        @foreach ($this->topics as $topic)
            <flux:select.option value="{{ $topic->id }}">{{ $topic->name }}</flux:select.option>
        @endforeach
        </flux:select>

        <div class="flex justify-between gap-2 mt-4">
            <div class="flex">
                <flux:button type="submit" variant="primary">
                    Add Post
                </flux:button>

                <div class="items-center ml-2">
                    <flux:button :href="route('posts.index')" wire:navigate>
                        Cancel
                    </flux:button>
                </div>

            </div>
        </div>
    </form>
</div>

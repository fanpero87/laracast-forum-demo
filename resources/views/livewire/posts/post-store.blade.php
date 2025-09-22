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
    <form method="POST" wire:submit="store">
        <flux:input type="text" wire:model="title" :label="__('Title')" required />
        <flux:textarea wire:model="body" rows="4" />
        <flux:error name="body" />
        
        <flux:select wire:model="topic_id" placeholder="Choose topic...">
        @foreach ($this->topics as $topic)
            <flux:select.option value="{{ $topic->id }}">{{ $topic->name }}</flux:select.option>
        @endforeach    
        </flux:select>
        
        <div class="flex justify-between gap-2 mt-4">
            <div class="flex">
                <flux:button type="submit" variant="primary" color="zinc">
                    Add Post
                </flux:button>

                <div class="items-center ml-2">
                    <flux:button type="button" variant="ghost" wire:click="cancel">
                        Cancel
                    </flux:button>
                </div>

            </div>
        </div>
    </form>
</div>

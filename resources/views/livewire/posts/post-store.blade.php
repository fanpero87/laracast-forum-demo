<div class="container mx-auto mt-8">
    <form method="POST" wire:submit="store" class="space-y-6">
        <h1 class="mt-4 text-2xl font-bold">Title</h1>
        <flux:input type="text" wire:model="title" required />

        <flux:composer wire:model="body" rows="5" label:sr-only placeholder="How can I help you today?">
            <x-slot name="input">
                <flux:editor variant="borderless" toolbar="bold italic bullet ordered | link | align" />
            </x-slot>
        </flux:composer>

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

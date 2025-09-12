<div>
    <form method="POST" wire:submit="store">
        <flux:input
            wire:model="title"
            :label="__('Title')"
            type="text"
            required
        />
        <flux:textarea wire:model="body" class="mt-2" rows="4"
            placeholder="Add a Post..." />
        <flux:error name="body" />

        <div class="flex justify-between gap-2 mt-4">
            <div class="flex">
                <flux:button variant="primary" type="submit" color="zinc">
                    Add Post
                </flux:button>
               
                <div class="items-center ml-2">
                    <flux:button variant="ghost" type="button" wire:click="cancel">
                        Cancel
                    </flux:button>
                </div>
               
            </div>
            {{-- <x-message-indicator /> --}}
        </div>
    </form>
</div>

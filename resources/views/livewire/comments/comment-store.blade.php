<div>
    <form method="POST" wire:submit="store">
        <flux:textarea wire:model="body" class="mt-2" rows="4"
            placeholder="{{ $commentBeingEdited ? 'Edit your comment...' : 'Add a comment...' }}"
             />
        <flux:error name="body" />

        <div class="flex justify-between gap-2 mt-4">
            <div class="flex">
                <flux:button variant="primary" type="submit" color="zinc">
                    {{ $commentBeingEdited ? 'Update Comment' : 'Add Comment' }}
                </flux:button>
                @if($commentBeingEdited)
                <div class="items-center ml-2">
                    <flux:button variant="ghost" type="button" wire:click="cancelEdit">
                        Cancel
                    </flux:button>
                </div>
                @endif
            </div>
            <x-message-indicator :message="$message" />
        </div>
    </form>
</div>

<div>
    <form method="POST" wire:submit="store">

        <flux:composer wire:model="body" rows="5" placeholder="{{ $commentBeingEdited ? 'Edit your comment...' : 'Add a comment...' }}">
            <x-slot name="input">
                <flux:editor variant="borderless" toolbar="bold italic bullet ordered | link | align" />
            </x-slot>
        </flux:composer>

        <div class="flex justify-between gap-2 mt-4">
            <div class="flex">
                <flux:button variant="primary" type="submit">
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

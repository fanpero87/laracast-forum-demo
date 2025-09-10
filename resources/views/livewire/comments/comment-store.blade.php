<div>
    <form method="POST" wire:submit="store">
        <flux:textarea 
            wire:model="body" 
            class="mt-2" 
            rows="4" 
            placeholder="{{ $commentBeingEdited ? 'Edit your comment...' : 'Add a comment...' }}"
            x-data="{ focused: @entangle('commentBeingEdited') }"
            x-effect="if (focused) { $el.focus(); $el.scrollIntoView({ behavior: 'smooth', block: 'center' }); }"
        />
        <flux:error name="body" />
        
        <div class="flex gap-2 mt-2">
            <flux:button variant="primary" type="submit" color="zinc">
                {{ $commentBeingEdited ? 'Update Comment' : 'Add Comment' }}
            </flux:button>
        </div>
    </form>
    
    @if($commentBeingEdited)
        <div class="mt-2">
            <flux:button variant="ghost" type="button" wire:click="cancelEdit">
                Cancel
            </flux:button>
        </div>
    @endif
</div>
</div>


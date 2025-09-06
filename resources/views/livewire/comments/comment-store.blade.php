<div>
    <form method="POST" wire:submit="store">
        <flux:textarea wire:model="body" class="mt-2" rows="4" />
        <flux:error name="body" />
        <flux:button variant="primary" type="submit" color="zinc" class="mt-2">Add Comment</flux:button>
    </form>
</div>


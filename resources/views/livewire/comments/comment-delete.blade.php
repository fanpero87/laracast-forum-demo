<div>
    <form method="PATCH" wire:submit="delete" wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE">
        @csrf
        @method('DELETE')
        <flux:button variant="danger" type="submit" class="mt-2">Delete Comment</flux:button>
    </form>
</div>

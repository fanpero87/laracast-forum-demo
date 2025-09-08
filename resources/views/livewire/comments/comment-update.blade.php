<div>
       <form method="POST" wire:submit="update">
        @csrf
        @method('PATCH')
        <flux:button variant="primary" color="blue" type="submit" class="mt-2">Update Comment</flux:button>
    </form>
</div>

<div class="container mx-auto mt-8">
    <form method="POST" wire:submit="store">
        <flux:input type="text" wire:model="title" :label="__('Title')" required />


        <div x-data="editor('Post something cool...')">
            <template x-if="isLoaded()">
                <div class="menu">
                    <button @click="toggleHeading({ level: 1 })"
                        :class="{ 'is-active': isActive('heading', { level: 1 }, updatedAt) }">
                        H1
                    </button>
                    <button @click="toggleBold()" :class="{ 'is-active' : isActive('bold', updatedAt) }">
                        Bold
                    </button>
                    <button @click="toggleItalic()" :class="{ 'is-active' : isActive('italic', updatedAt) }">
                        Italic
                    </button>
                </div>
            </template>

            <div class="mt-8 border border-amber-600" x-ref="element"></div>
        </div>

        <flux:textarea wire:model="body" class="mt-2" rows="4" placeholder="Add a Post..." />
        <flux:error name="body" />

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
            {{--
            <x-message-indicator /> --}}
        </div>
    </form>
</div>

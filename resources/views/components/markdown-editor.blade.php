<div wire:model="body" x-data="editor('Post something cool...')">
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

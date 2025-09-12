@props([
    'message',
])

<div x-show="$wire.showIndicator" x-transition.out.opacity.duration.2000ms
    x-effect="if($wire.showIndicator) setTimeout(() => $wire.showIndicator = false, 3000)"
    >
    <div class="flex items-center gap-2 text-sm font-medium text-green-500">
        {{ $message }}

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
</div>

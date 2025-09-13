<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:header class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900" container>
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <a class="flex items-center space-x-2 me-5 ms-2 lg:ms-0 rtl:space-x-reverse" href="{{ route('dashboard') }}"
            wire:navigate>
            <x-app-logo />
        </a>

        <flux:navbar class="-mb-px max-lg:hidden">
            @if (auth()->user())
            <flux:navbar.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                wire:navigate>
                {{ __('Dashboard') }}
            </flux:navbar.item>

            <flux:navbar.item icon="layout-grid" :href="route('posts.index')"
                :current="request()->routeIs('posts.index')" wire:navigate>
                {{ __('Posts') }}
            </flux:navbar.item>

            @can('create', App\Models\Post::class)
            <flux:navbar.item icon="layout-grid" :href="route('posts.store')"
                :current="request()->routeIs('posts.store')" wire:navigate>
                {{ __('Create Post') }}
            </flux:navbar.item>
            @endcan
            
            @else
            <flux:navbar.item icon="layout-grid" :href="route('posts.index')"
                :current="request()->routeIs('posts.index')" wire:navigate>
                {{ __('Post') }}
            </flux:navbar.item>
            @endif
        </flux:navbar>

        <!-- Desktop User Menu -->
        @if (auth()->user())
        <flux:dropdown position="top" align="end">
            <flux:profile class="cursor-pointer" :initials="auth()->user()->initials()" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex w-8 h-8 overflow-hidden rounded-lg shrink-0">
                                <span
                                    class="flex items-center justify-center w-full h-full text-black rounded-lg bg-neutral-200 dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-sm leading-tight text-start">
                                <span class="font-semibold truncate">{{ auth()->user()->name }}</span>
                                <span class="text-xs truncate">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form class="w-full" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <flux:menu.item class="w-full" type="submit" as="button" icon="arrow-right-start-on-rectangle">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
        @endif
    </flux:header>

    <!-- Mobile Menu -->
    <flux:sidebar class="border-e border-zinc-200 bg-zinc-50 lg:hidden dark:border-zinc-700 dark:bg-zinc-900" stashable
        sticky>
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a class="flex items-center space-x-2 ms-1 rtl:space-x-reverse" href="{{ route('dashboard') }}" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Platform')">
                <flux:navlist.item icon="layout-grid" :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>
    </flux:sidebar>

    {{ $slot }}

    @fluxScripts
</body>

</html>

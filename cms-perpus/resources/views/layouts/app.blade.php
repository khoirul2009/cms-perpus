<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CMS - Perpus') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        <div class="drawer lg:drawer-open">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content ">
                <livewire:layout.navigation />

                {{ $slot }}

            </div>
            <div class="drawer-side">
                <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu p-4 w-80 min-h-full bg-sky-950 text-white">
                    <li>
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </li>
                    @auth
                        @if (Auth::user()->is_admin)
                            <li>
                                <x-nav-link :href="route('user')" :active="request()->routeIs('user')" wire:navigate>
                                    {{ __('User') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link :href="route('book')" :active="request()->routeIs('book')" wire:navigate>
                                    {{ __('Book') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')" wire:navigate>
                                    {{ __('Category') }}
                                </x-nav-link>
                            </li>
                        @endif
                    @endauth
                    <li class="mt-auto">
                        <details>
                            <summary>
                                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                    x-on:profile-updated.window="name = $event.detail.name"></div>
                            </summary>
                            <ul className="p-2 bg-base-100 rounded-t-none">
                                <li>
                                    <x-nav-link :href="route('profile')" :active="request()->routeIs('profile')" wire:navigate>
                                        {{ __('Profile') }}
                                    </x-nav-link>
                                </li>
                                <li>
                                    <livewire:layout.logout />
                                </li>
                            </ul>
                        </details>

                    </li>


                </ul>

            </div>

        </div>
    </div>
    @livewireScripts
    <script src="https://kit.fontawesome.com/ad19400cbc.js" crossorigin="anonymous"></script>
</body>

</html>

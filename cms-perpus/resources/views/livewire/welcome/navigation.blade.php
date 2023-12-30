<div class="navbar bg-base-100 fixed">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl">CMS - Perpus</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            @auth
                <li>
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        wire:navigate>Dashboard</a>
                </li>
            @else
                <li>

                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        wire:navigate>Log in</a>
                </li>

                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}"
                            class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            wire:navigate>Register</a>

                    </li>
                @endif
            @endauth

        </ul>
    </div>
</div>

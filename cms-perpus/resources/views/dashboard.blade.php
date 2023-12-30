<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a class="btn btn-primary mb-5" href="/book/create">
                <i class="fa-solid fa-plus"></i>
                <span>Add Book</span>
            </a>
            @livewire('show-book-user')
        </div>

    </div>
</x-app-layout>

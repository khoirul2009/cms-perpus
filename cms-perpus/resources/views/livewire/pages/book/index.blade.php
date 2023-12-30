<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex space-x-3">
                <a class="btn btn-primary mb-5" href="/book/create" wire:navigate>
                    <i class="fa-solid fa-plus"></i>
                    <span>Add Book</span>
                </a>
                <a class="btn btn-accent mb-5" href="/download-book">
                    <i class="fa-solid fa-table"></i>
                    <span>Export to Excel</span>
                </a>

            </div>
            @livewire('show-books')
        </div>
    </div>
</x-app-layout>

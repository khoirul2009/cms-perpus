<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center ">
                    <h1 class="text-3xl font-bold mb-5"> {{ $book->title }} </h1>
                    <img src="{{ asset('storage/') . '/' . $book->cover_path }}" class="max-h-[300px] mx-auto rounded-lg"
                        alt="">
                    <p class="mt-5 text-lg badge badge-primary badge-outline">Category : {{ $book->category->category }}
                    </p>
                    <p class="mt-5 text-lg">Quantity : {{ $book->quantity }} </p>
                    <p class="my-5 text-lg">User : {{ $book->user->name }} </p>
                    <object data="{{ asset('storage') . '/' . $book->pdf_path }}" type="application/pdf" width="100%"
                        height="500px">
                        <p>Unable to display PDF file. <a
                                href="/uploads/media/default/0001/01/540cb75550adf33f281f29132dddd14fded85bfc.pdf">Download</a>
                            instead.</p>
                    </object>
                    <div class="grid grid-cols-2 gap-5 w-full mt-10">
                        <a href="/book/{{ $book->id }}/edit" wire:navigate class="btn w-full btn-warning ">Edit</a>

                        <!-- Open the modal using ID.showModal() method -->
                        <button class="btn w-full btn-error " onclick="my_modal_1.showModal()">Delete</button>
                        <dialog id="my_modal_1" class="modal">
                            <div class="modal-box ">
                                <h3 class="font-bold text-lg text-left">Hello!</h3>
                                <p class="py-4 text-left">Are you sure to delete this item?</p>
                                <div class="modal-action">
                                    <form method="dialog flex">
                                        @livewire('delete-book', ['book' => $book])
                                        <button class="btn">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<div class="p-6 text-gray-900 dark:text-gray-100">

    {{-- alert --}}
    @if ($showToast)
        @if (session()->has('success'))
            <div class="toast toast-center ">
                <div class="alert alert-success">
                    <span>{{ session()->get('success') }}</span>
                    <span class="cursor-pointer hover:opacity-85" wire:click="closeToast()">X</span>
                </div>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="toast toast-center">
                <div class="alert alert-error">
                    <span>{{ session()->get('error') }}</span>
                </div>
            </div>
        @endif
    @endif

    {{-- end alert --}}

    <h1 class="text-xl font-medium m3-5">Form Category</h1>
    @if ($updateCategory)
        @include('livewire.pages.category.update')
    @else
        @include('livewire.pages.category.create')
    @endif

    <h1 class="text-xl font-medium mt-5">List Category</h1>
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                {{ $category->category }}
                            </td>
                            <td>
                                <button wire:click="edit({{ $category->id }})"
                                    class="btn btn-primary btn-sm">Edit</button>
                                <button wire:click.prevent="destroy({{ $category->id }})"
                                    class="btn btn-error btn-sm">Delete</button>



                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" align="center">
                            No Categories Found.
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>


    </div>




</div>

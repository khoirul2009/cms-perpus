<div>
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
    <form enctype="multipart/form-data" wire:submit.prevent="update">
        <div class="mb-3 space-y-3">
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input wire:model="title" id="title" placeholder="Type here.." class="block mt-1 w-full"
                type="text" name="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div class="mb-3 space-y-3">
            <x-input-label for="category" :value="__('Category')" />
            <select class="select select-bordered w-full  mt-1" wire:model="category_id">
                <option disabled selected>Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->category }}</option>
                @endforeach

            </select>
            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
        </div>
        <div class="mb-3 space-y-3">
            <x-input-label for="pdf" :value="__('PDF')" />
            <input accept=".pdf" wire:model="pdf_path" type="file" class="file-input file-input-bordered w-full" />
            <x-input-error :messages="$errors->get('pdf_path')" class="mt-2" />
        </div>
        <div class="mb-3 space-y-3">
            @if ($cover_path)
                Photo Preview:
                <img src="{{ $cover_path->temporaryUrl() }}" class="max-h-[300px]">
            @else
                <img src=" {{ asset('storage') . '/' . $book->cover_path }}" class="max-h-[300px]">
            @endif
            <x-input-label for="cover" :value="__('Cover')" />
            <input accept=".svg,.jpg,.jpeg,.png,.webp" wire:model="cover_path" type="file"
                class="file-input file-input-bordered w-full" />
            <x-input-error :messages="$errors->get('cover_path')" class="mt-2" />
        </div>
        <div class="mb-3 space-y-3">
            <x-input-label for="quantity" :value="__('Quantity')" />
            <x-text-input wire:model="quantity" id="quantity" placeholder="Type here.." class="block mt-1 w-full"
                type="number" name="quantity" />
            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
        </div>
        <div class="">
            <button type="submit" class="btn btn-success btn-block">Save</button>
        </div>
    </form>
</div>

<div>
    <div class="flex space-x-3 ">
        <a class="btn btn-primary mb-5" href="/book/create" wire:navigate>
            <i class="fa-solid fa-plus"></i>
            <span>Add Book</span>
        </a>


        <select wire:model.live="category" class=" select select-bordered w-full max-w-xs">
            <option value="" selected>Any Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach

        </select>

    </div>
    <div class="grid grid-cols-4 gap-5">
        @foreach ($books as $book)
            <a wire:navigate href="book/{{ $book->id }}" class="card  bg-base-100 shadow-xl">
                <figure class="px-10 pt-10">
                    <img src="{{ asset('storage') . '/' . $book->cover_path }}" alt="Shoes"
                        class="rounded-xl max-h-[250px]" />
                </figure>
                <div class="card-body  ">
                    <h2 class="card-title">{{ $book->title }}</h2>
                    <div class="badge badge-primary badge-outline">{{ $book->category->category }}</div>
                    <p>Quantity : {{ $book->quantity }} </p>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-10">

        {{ $books->links() }}
    </div>
</div>

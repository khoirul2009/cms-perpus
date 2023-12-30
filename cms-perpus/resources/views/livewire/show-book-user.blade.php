<div>
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

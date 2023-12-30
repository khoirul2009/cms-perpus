<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBookUser extends Component
{
    use WithPagination;

    public function render()
    {
        return view(
            'livewire.show-book-user',
            [
                'books' => Book::where('user_id', Auth::user()->id)->with(['category'])->paginate(8)
            ]
        );
    }
}

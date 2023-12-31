<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBookUser extends Component
{
    use WithPagination;
    public $categories;
    public $category;
    public function mount()
    {
        $this->categories = Category::all();
    }
    public function render()
    {
        $books = Book::when($this->category, function ($query) {
            $query->where('category_id', $this->category);
            $query->where('user_id', Auth::user()->id);
        })->paginate(8);
        return view(
            'livewire.show-book-user',
            [
                'books' => $books
            ]
        );
    }
}

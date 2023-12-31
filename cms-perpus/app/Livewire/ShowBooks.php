<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBooks extends Component
{
    use WithPagination;
    public $category;
    public $categories;
    public function mount()
    {
        $this->categories = Category::all();
    }
    public bool $showToast = false;

    public function render()
    {
        $this->showToast = true;

        $books = Book::when($this->category, function ($query) {
            $query->where('category_id', $this->category);
        })->paginate(8);

        return view('livewire.pages.book.show-books', [
            // 'books' => Book::with(['category'])->where('category_id', (int) $this->category)->paginate(8),
            'books' => $books
        ]);
    }
    public function closeToast()
    {
        $this->showToast = false;
    }
}

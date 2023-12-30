<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBooks extends Component
{
    use WithPagination;

    public bool $showToast = false;

    public function render()
    {
        $this->showToast = true;
        return view('livewire.pages.book.show-books', [
            'books' => Book::with(['category'])->paginate(8)
        ]);
    }
    public function closeToast()
    {
        $this->showToast = false;
    }
}

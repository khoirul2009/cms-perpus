<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeleteBook extends Component
{
    public Book $book;

    public function render()
    {
        return view('livewire.pages.book.delete-book');
    }
    public function destroy()
    {
        $book = Book::find($this->book->id);

        Storage::delete($book->pdf_path);
        Storage::delete($book->cover_path);

        $book->delete();


        return redirect()->route('dasboard')->with('success', 'Book Deleted Successfully!');
    }
}

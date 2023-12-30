<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BookEdit extends Component
{
    use WithFileUploads;
    public $book;
    public $title, $book_id, $category_id, $pdf_path, $cover_path, $quantity;


    protected $rules = [
        'title' => 'required|max:255',
        'category_id' => 'required',
        'quantity' => 'required|min:1'
    ];

    public function render()
    {
        $this->title = $this->book->title;
        $this->book_id = $this->book->id;
        $this->category_id = $this->book->category_id;
        $this->quantity = $this->book->quantity;

        return view('livewire.pages.book.book-edit', [
            'book' => $this->book,
            'categories' => Category::all(),
        ]);
    }
    public function update()
    {
        $this->validate();

        try {
            $this->book = Book::find($this->book_id);

            if ($this->cover_path) {
                Storage::delete($this->book->cover_path);
            }
            if ($this->pdf_path) {
                Storage::delete($this->book->pdf_path);
            }

            Book::find($this->book_id)->update([
                'title' => $this->title,
                'category_id' => $this->category_id,
                'quantity' => $this->quantity,
                'cover_path' => $this->cover_path ? $this->cover_path->store('photos') : $this->book->cover_path,
                'pdf_path' => $this->pdf_path ? $this->pdf_path->store('docs') : $this->book->pdf_path,
            ]);

            return redirect()->route('book.detail', $this->book_id)->with('success', 'Book success updated');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}

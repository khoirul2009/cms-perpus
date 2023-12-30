<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class BookCreate extends Component
{
    use WithFileUploads;

    public $title, $book_id, $category_id = "", $pdf_path, $cover_path, $quantity;

    public function render()
    {
        return view('livewire.pages.book.book-create', [
            'categories' => Category::all(),
        ]);
    }

    protected $rules = [
        'title' => 'required|max:255',
        'category_id' => 'required',
        'cover_path' => 'required|image|max:3200',
        'pdf_path' => 'required',
        'quantity' => 'required|min:1'
    ];


    public function store()
    {
        $this->validate();
        try {
            $this->cover_path =  $this->cover_path->store('photos');
            $this->pdf_path = $this->pdf_path->store('docs');
            $book = Book::create([
                'title' => $this->title,
                'category_id' => $this->category_id,
                'user_id' => Auth::user()->id,
                'quantity' => $this->quantity,
                'cover_path' => $this->cover_path,
                'pdf_path' => $this->pdf_path
            ]);
            session()->flash('success', 'Book Created Successfully!');

            return redirect()->to('/book/' . $book->id);
        } catch (\Exception $e) {
            // Log::error($e->getMessage());
            session()->flash('error', $e->getMessage());
        }
    }
}

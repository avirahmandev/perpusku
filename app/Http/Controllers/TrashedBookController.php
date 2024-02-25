<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrashedBookController extends Controller
{
    public function archive()
    {
        $data = Book::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();

        return view('dashboard/books/trash', compact('data'));
    }

    public function restore(Book $book)
    {

        $book->restore();

        return redirect()->to('/dashboard/trash');
    }

    public function destroy(Request $request, Book $book)
    {
        // check book if inside the trash
        if ($book->trashed()) {
        
            // delete cover
            if($book->cover && ($book->cover != 'books-cover/cover_default.png')) {
                Storage::delete($book->cover);
            }

            // delete pdf
            if($book->file_pdf) {
                Storage::delete($book->file_pdf);
            }

            // delete book
            $book->forceDelete();
        }

        return redirect()->to('/dashboard/trash');
    }
}

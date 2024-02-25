<?php

namespace App\Http\Controllers\Api\Book;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Storage;


class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "data"      => BookResource::collection(Book::all()),
            "status"    => "success"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        // validated properties independently
        $request->validate([
            'cover'     => 'required',
            'slug'      => 'required|unique:books',
        ],
        [
            'cover.required'    => 'Gambar wajib diisi!',
            'slug.unique'       => 'Permalink telah digunakan, bersifat unik. Tambahkan karakter lagi di akhir!'
        ]);

        $validatedData = [
            'cover'         => request()->file('cover')->store('books-cover'),
            'judul'         => request('judul'),
            'slug'          => request('slug'),
            'penulis'       => request('penulis'),
            'deskripsi'     => request('deskripsi'),
            'halaman'       => request('halaman'),
            'tipe'          => request('tipe'),
            'penerbit'      => request('penerbit'),
            'file_pdf'      => request()->file('file_pdf')->store('books-pdf'),
            'category_id'   => request('category_id'),
            'populer'       => request('populer'),
            'rekomendasi'   => request('rekomendasi')
        ];

        // create empty book object
        $book = new Book;
        // fill object field with array validatedData
        $book->fill($validatedData);

        // save new book
        if($book->save()) {
            return new BookResource($book);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {

        return new BookResource($book);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {

        $validatedData = [
            'judul'         => request('judul'),
            'slug'          => request('slug'),
            'penulis'       => request('penulis'),
            'deskripsi'     => request('deskripsi'),
            'halaman'       => request('halaman'),
            'tipe'          => request('tipe'),
            'penerbit'      => request('penerbit'),
            'category_id'   => request('category_id'),
            'populer'       => request('populer'),
            'rekomendasi'   => request('rekomendasi')
        ];

        // validate more, check if have new slug and unique
        if ($request->slug != $book->slug) {
            $request->validate(['slug' => 'required|unique:books']);
        }

        // if have new cover
        if ($request->file('cover')) {

            // if hava old cover and not default image, delete
            if ($request->oldCover && ($request->oldCover != 'books-cover/cover_default.png')) {
                Storage::delete($request->oldCover);
            }

            // store new cover
            $validatedData['cover'] = $request->file('cover')->store('books-cover');
        }

        // if have new pdf
        if ($request->file('file_pdf')) {

            // delete old pdf file if exist
            if ($request->oldFilePdf) {
                Storage::delete($request->oldFilePdf);
            }

            // store new pdf
            $validatedData['file_pdf'] = $request->file('file_pdf')->store('books-pdf');
        }

        // fill object field with array validatedData
        $book->fill($validatedData);
        
        // save changes book
        if($book->save()) {
            return new BookResource($book);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {

        # store book to trash bin
        Book::destroy($book->id);

        return response()->json([
            "data"      => "Buku telah dipindahkan ke Trash!",
            "status"    => "success"
        ]);
    }
}

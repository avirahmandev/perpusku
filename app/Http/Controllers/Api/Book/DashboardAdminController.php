<?php

namespace App\Http\Controllers\Api\Book;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;


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
        $validatedData = [
            // 'cover'         => request('cover'),
            'judul'         => request('judul'),
            'slug'          => request('slug'),
            'penulis'       => request('penulis'),
            'deskripsi'     => request('deskripsi'),
            'halaman'       => request('halaman'),
            'tipe'          => request('tipe'),
            'penerbit'      => request('penerbit'),
            // 'file_pdf'      => request('file_pdf'),
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
            // 'cover'         => request('cover'),
            'judul'         => request('judul'),
            'slug'          => request('slug'),
            'penulis'       => request('penulis'),
            'deskripsi'     => request('deskripsi'),
            'halaman'       => request('halaman'),
            'tipe'          => request('tipe'),
            'penerbit'      => request('penerbit'),
            // 'file_pdf'      => request('file_pdf'),
            'category_id'   => request('category_id'),
            'populer'       => request('populer'),
            'rekomendasi'   => request('rekomendasi')
        ];

        // validate more, check if have new slug and unique
        if ($request->slug != $book->slug) {
            $request->validate(['slug' => 'required|unique:books']);
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

        // delete book function
        $book->delete();

        return response()->json([
            "data"      => "Buku telah dihapus!",
            "status"    => "success"
        ]);
    }
}

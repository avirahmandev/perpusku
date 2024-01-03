<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "data" => Book::all()
        ];

        return view('dashboard/books/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('dashboard/books/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $request->file('cover')->store('books-cover');

        $validatedData = $request->validate([
            'cover'         => 'required|image|file|max:1024',
            'judul'         => 'required|max:255',
            'slug'          => 'required|unique:books',
            'penulis'       => 'required',
            'deskripsi'     => 'required|max:1000',
            'halaman'       => 'required|min:0|max:5000',
            'tipe'          => 'required',
            'penerbit'      => 'required',
            // 'file_pdf'      => 'required',
            'category_id'   => 'required',
            'populer'       => 'required',
            'rekomendasi'   => 'required'
        ],
        [
            'required'      => 'Kolom wajib diisi!',
            'slug.unique'   => 'Permalink telah digunakan, bersifat unik. Tambahkan karakter lagi di akhir!',
            'cover.max'     => 'Upload gambar sampul maksimal 1mb.',
            'cover.image'   => 'File harus berformat gambar!'
        ]);

        # store the image file
        $validatedData['cover'] = $request->file('cover')->store('books-cover');

        Book::create($validatedData);
        return redirect('/dashboard/books')->with('success', 'Berhasil menambahkan buku!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('dashboard/books/detail', $book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('dashboard/books/edit', [
            'book'  => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'cover'         => 'image|file|max:1024',
            'judul'         => 'required|max:255',
            'penulis'       => 'required',
            'deskripsi'     => 'required|max:1000',
            'halaman'       => 'required|min:0|max:5000',
            'tipe'          => 'required',
            'penerbit'      => 'required',
            // 'file_pdf'      => 'required',
            'category_id'   => 'required',
            'populer'       => 'required',
            'rekomendasi'   => 'required'
        ];

        $customMessages = [
            'required'      => 'Kolom wajib diisi!',
            'slug.unique'   => 'Permalink telah digunakan, bersifat unik. Tambahkan karakter lagi di akhir!',
            'cover.max'     => 'Upload gambar sampul maksimal 1mb.',
            'cover.image'   => 'File harus berformat gambar!'
        ];

        if($request->slug != $book->slug) {
            $rules['slug'] = 'required|unique:books';
        }

        $validatedData = $request->validate($rules, $customMessages);

        # if have new cover, store
        if ($request->file('cover')) {

            # if have old img, delete
            if($request->file('cover')) {
                if($request->oldCover) {
                    Storage::delete($request->oldCover);                
                }
            }

            $validatedData['cover'] = $request->file('cover')->store('books-cover');
        }

        Book::where('id', $book->id)->update($validatedData);
        return redirect('/dashboard/books')->with('success', 'Berhasil memperbarui informasi buku!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if($book->cover) {
            Storage::delete($book->cover);
        }

        Book::destroy($book->id);
        return redirect('/dashboard/books')->with('success', 'Buku berhasil dipindahkan ke Trash!');
    }
}

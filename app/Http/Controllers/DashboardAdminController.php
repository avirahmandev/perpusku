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

        // check if book type not e-book, validate pdf file
        if (!$request('tipe')) {
            $request->validate(['file_pdf' => 'required']);
        }

        $validatedData = $request->validate([
            'cover'         => 'required|image|file|max:1024',
            'judul'         => 'required|max:255',
            'slug'          => 'required|unique:books',
            'penulis'       => 'required',
            'deskripsi'     => 'required|max:1000',
            'halaman'       => 'required|min:0|max:5000',
            'tipe'          => 'required',
            'penerbit'      => 'required',
            'file_pdf'      => 'mimes:pdf|max:10240',
            'category_id'   => 'required',
            'populer'       => 'required',
            'rekomendasi'   => 'required'
        ],
        [
            'required'          => 'Kolom wajib diisi!',
            'slug.unique'       => 'Permalink telah digunakan, bersifat unik. Tambahkan karakter lagi di akhir!',
            'cover.max'         => 'Upload gambar sampul maksimal 1mb.',
            'cover.image'       => 'File harus berformat gambar!',
            'file_pdf.mimes'    => 'File harus berformat pdf!',
            'file_pdf.max'      => 'Upload file pdf maksimal 10mb.'
        ]);

        # store the cover & pdf file, if exist
        $validatedData['cover'] = $request->file('cover')->store('books-cover');
        // if have pdf file, store
        if($request->hasFile('file_pdf')) {
            $validatedData['file_pdf'] = $request->file('file_pdf')->store('books-pdf');
        }

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
            'file_pdf'      => 'mimes:pdf|max:10240',
            'category_id'   => 'required',
            'populer'       => 'required',
            'rekomendasi'   => 'required'
        ];

        $customMessages = [
            'required'          => 'Kolom wajib diisi!',
            'slug.unique'       => 'Permalink telah digunakan, bersifat unik. Tambahkan karakter lagi di akhir!',
            'cover.max'         => 'Upload gambar sampul maksimal 1mb.',
            'cover.image'       => 'File harus berformat gambar!',
            'file_pdf.mimes'    => 'File harus berformat pdf!',
            'file_pdf.max'      => 'Upload file pdf maksimal 10mb.'
        ];

        if($request->slug != $book->slug) {
            $rules['slug'] = 'required|unique:books';
        }

        $validatedData = $request->validate($rules, $customMessages);

        # if have new cover, store
        if ($request->file('cover')) {

            # if have old img, delete
            if($request->file('cover')) {
                # if not default image cover
                if($request->oldCover && ($request->oldCover != 'books-cover/cover_default.png')) {
                    Storage::delete($request->oldCover);                
                }
            }

            $validatedData['cover'] = $request->file('cover')->store('books-cover');
        }

        # if have new pdf, store
        if ($request->file('file_pdf')) {
            
            # if have old pdf, delete
            if($request->file('file_pdf')) {
                if($request->oldFilePdf) {
                    Storage::delete($request->oldFilePdf);
                }
            }

            $validatedData['file_pdf'] = $request->file('file_pdf')->store('books-pdf');
        }

        Book::where('id', $book->id)->update($validatedData);
        return redirect('/dashboard/books')->with('success', 'Berhasil memperbarui informasi buku!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {

        # store book to trash bin
        Book::destroy($book->id);
        
        return redirect('/dashboard/books')->with('success', 'Buku berhasil dipindahkan ke Trash!');
    }
}

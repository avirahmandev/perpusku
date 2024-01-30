@extends('layouts/user_layout')

@section('userContent')
<header class="container-fluid pt-5">
    <div class="mx-5 mt-4">
        <h2 class="text-center mb-4">Buku Dipinjam</h2>
        <div class="row g-4">
            @foreach($data as $book_borrowed)
            <div class="col-3 mb-3">
                <div class="card">
                    <a href="book/{{ $book_borrowed->slug }}" style="text-decoration: none; color: inherit;">
                        <div style="max-height: 145px; overflow: hidden;">
                            <img src="{{ asset('storage/'. $book_borrowed->cover) }}" class="card-img-top" alt="{{ $book_borrowed->judul }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $book_borrowed->judul }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $book_borrowed->penulis }}</h6>
                            <p class="card-text text-wrap excerp">{{ $book_borrowed->deskripsi }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
            {{-- {{ $data->links() }} --}}
    </div>
</header>

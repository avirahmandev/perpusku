@extends('layouts/user_layout')

@section('userContent')
<header class="container-fluid pt-5">
    <div class="mx-5 mt-4">
        <h2 class="text-center mb-4">Buku Dipinjam</h2>
        <div class="row g-4">
            @foreach($data as $book_wishlist)
            <div class="col-3 mb-3">
                <div class="card">
                    <img src="assets/img/background_blue.png" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-truncate">{{ $book_wishlist->judul }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $book_wishlist->penulis }}</h6>
                        <p class="card-text text-wrap excerp">{{ $book_wishlist->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
            {{-- {{ $data->links() }} --}}
    </div>
</header>

@extends('layouts/user_layout')

@section('userContent')
<header class="container-fluid pt-5">
    <div class="mx-5 mt-4">
        <h2 class="text-center mb-4">Daftar Favorit</h2>
        <div class="row g-4">
            @if($data->count() > 0)
            @foreach($data as $book_wishlist)
            <div class="col-3 mb-3">
                <div class="card">
                    <a href="book/{{ $book_wishlist->slug }}" style="text-decoration: none; color: inherit;">
                        <div style="max-height: 145px; overflow: hidden;">
                            <img src="{{ asset('storage/'. $book_wishlist->cover) }}" class="card-img-top" alt="{{ $book_wishlist->judul }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $book_wishlist->judul }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $book_wishlist->penulis }}</h6>
                            <p class="card-text text-wrap excerp">{{ $book_wishlist->deskripsi }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @else
            <p class="text-center fs-5 mx-auto">Buku tidak ditemukan.</p>
            @endif
        </div>
            {{-- {{ $data->links() }} --}}
    </div>
</header>
<script>
window.addEventListener('load', function() {

    $('.card').hover(
        function () {
            $(this).addClass("shadow");
            $(this).css({
                transition: "transform 0.2s",
                transform: "translateY(-5px)",
            });
        },
        function () {
            $(this).removeClass("shadow");
            $(this).css({
                transition: "transform 0.2s",
                transform: "translateY(0)",
            });
        },
    );

});
</script>
@endSection
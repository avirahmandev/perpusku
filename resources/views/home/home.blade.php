@extends('layouts/main_layout')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<header class="container-fluid bg-primary" id="header">
    <div class="container">
        <h1 class="slogan text-light"><span>Pinjam Buku Terbaru,</span><br>Teratas, dan Terlengkap<br>hanya di PERPUSKU
        </h1>
    </div>
</header>
@if(session()->has('loginBerhasil'))
<div class="alert alert-success alert-dismissible fade show float-end" role="alert" style="display: inline; position: fixed; top: 12%; right: 5%; z-index: 999;">
    {{ session('loginBerhasil') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('logoutBerhasil'))
<div class="alert alert-success alert-dismissible fade show float-end" role="alert" style="display: inline; position: fixed; top: 12%; right: 5%; z-index: 999;">
    {{ session('logoutBerhasil') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<section class="menu-bar">
    <div class="container menu rounded bg-light d-flex justify-content-evenly">
        <div onclick="location.href='#'" class="circle rounded-circle text-center d-flex"><i class="bi bi-grid"></i><span>Kategori</span></div>
        <div onclick="location.href={{ auth()->check() ? '\'/wishlist\'' : '\'/login\'' }}" class="circle rounded-circle text-center d-flex"><i class="bi bi-bookmark-heart"></i><span>Favorit</span></div>
        <div onclick="location.href={{ auth()->check() ? '\'/borrowed\'' : '\'/login\'' }}" class="circle rounded-circle text-center d-flex"><i class="bi bi-journal-bookmark"></i><span>Buku Dipinjam</span></div>
        <div onclick="location.href='#'" class="circle rounded-circle text-center d-flex"><i class="bi bi-exclamation-circle"></i><span>Panduan</span></div>
        <div onclick="location.href='#'" class="circle rounded-circle text-center d-flex" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="bi bi-search"></i><span>Cari</span></div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <form class="col-12" action="/books">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Cari buku..">
                </form>
            </div>
            <div class="modal-body" style="min-height: 50vh; max-height: 50vh; overflow-y: auto;">
                <div class="m-auto text-center">
                    <small>Tidak ada hasil.</small>
                </div>
            </div>
            <div class="modal-footer py-2">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<section class="rekomendasi-section" id="rekomendasi">
    <div class="container">
        <h2>Buku Rekomendasi</h2>
        <a href="/books?sortby=rekomendasi">Lihat Semua</a>
        <div class="daftar-rekomendasi mt-1 row row-cols-md-4 g-4 justify-content-start align-items-center d-flex flex-row flex-nowrap overflow-x-auto horizontal-scroll">
            <!-- Card -->
            <?php $j=0; ?>
            @foreach($data as $buku_rekomendasi)
                @if($buku_rekomendasi->rekomendasi)
                <?php 
                if ($j == 6) {
                    break;
                } else {
                    $j++;
                }
                ?>
                    <div class="col mb-2">
                        <div class="card">
                            <a href="book/{{ $buku_rekomendasi->slug }}" style="text-decoration: none; color: inherit;">
                                <div style="max-height: 145px; overflow: hidden;">
                                    <img src="{{ asset('storage/'. $buku_rekomendasi->cover) }}" class="card-img-top" alt="{{ $buku_rekomendasi->judul }}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-truncate">{{ $buku_rekomendasi->judul }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $buku_rekomendasi->penulis }}</h6>
                                    <p class="card-text text-wrap excerp">{{ $buku_rekomendasi->deskripsi }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
<section class="populer-section" id="populer">
    <div class="container">
        <h2>Buku-Buku Terpopuler</h2>
        <a href="/books?sortby=populer">Lihat Semua</a>
        <div class="daftar-populer mt-1 row row-cols-md-4 g-4 justify-content-start align-items-center d-flex flex-row flex-nowrap overflow-x-auto horizontal-scroll">
            <!-- Card -->
            <?php $j=0; ?>
            @foreach($data as $buku_populer)
                @if($buku_populer->populer)
                <?php 
                if ($j == 6) {
                    break;
                } else {
                    $j++;
                }
                ?>
                    <div class="col mb-2">
                        <div class="card">
                            <a href="book/{{ $buku_populer->slug }}" style="text-decoration: none; color: inherit;">
                                <div style="max-height: 145px; overflow: hidden;">
                                    <img src="{{ asset('storage/'. $buku_populer->cover) }}" class="card-img-top" alt="{{ $buku_populer->judul }}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-truncate">{{ $buku_populer->judul }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $buku_populer->penulis }}</h6>
                                    <p class="card-text text-wrap excerp">{{ $buku_populer->deskripsi }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
<section class="unggulan-section" id="unggulan">
    <div class="container">
        <h2 class="mb-4">Unggulan</h2>
        <div class="card card-unggulan1 col-md-9">
            <a href="book/{{ $data[0]->slug }}" style="text-decoration: none; color: inherit;">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data[0]->judul }}</h5>
                        <p class="card-text">{{ $data[0]->deskripsi }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('storage/'. $data[0]->cover) }}" class="img-unggulan img-fluid" alt="{{ $data[0]->judul }}">
                </div>
            </div>
            </a>
        </div>
        <div class="card card-unggulan2 col-md-9">
            <a href="book/{{ $data[1]->slug }}" style="text-decoration: none; color: inherit;">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage/'. $data[1]->cover) }}" class="img-unggulan img-fluid" alt="{{ $data[1]->judul }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data[1]->judul }}</h5>
                        <p class="card-text">{{ $data[1]->deskripsi }}</p>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
</section>
<section class="relevan-section" id="relevan">
    <div class="container">
        <h2>Semua Buku</h2>
        <a href="/books">Lihat Semua</a>
        <div class="daftar-relevan mt-2 row row-cols-md-4 g-4 justify-content-start align-items-center d-flex flex-row flex-nowrap overflow-x-auto horizontal-scroll">
            <?php $i=0; ?>
            @foreach($data as $book)
            <?php 
            if ($i == 6) {
                break;
            } else {
                $i++;
            }
            ?>
            <div class="col mb-2">
                <div class="card">
                    <a href="book/{{ $book->slug }}" style="text-decoration: none; color: inherit;">
                        <div style="max-height: 145px; overflow: hidden;">
                            <img src="{{ asset('storage/'. $book->cover) }}" class="card-img-top" alt="{{ $book->judul }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $book->judul }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $book->penulis }}</h6>
                            <p class="card-text excerp">{{ $book->deskripsi }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<script>
const searchField = document.querySelector('#search');
searchField.addEventListener('keyup', function() {
    search();
});

function search() {

    var keyword = $('#search').val();
    $.post('{{ route("books/search") }}',
    {
        _token: $('meta[name="csrf-token"]').attr('content'),
        keyword: keyword
    },

    function(data) {
        table_post_row(data);
    });
}

// table row with ajax
function table_post_row(res) {
    
    let htmlView = '';

    if(res.books.length <= 0) {
        htmlView += `
            <div class="m-auto text-center">
                <small>Tidak ada hasil.</small>
            </div>
        `;
    }

    for(let i=0; i<res.books.length; i++) {
        htmlView += `
            <div class="card mb-1" style="max-height: 15vh;">
                <div class="row g-0">
                    <div class="col-3">
                        <div style="height: 80px; background-size: fill; overflow: hidden;">
                            <img src="{{ asset('storage/` + res.books[i].cover + `') }}" class="img-fluid rounded-start" alt="` + res.books[i].judul + `" style="width: 100%; height: 100%;">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card-body py-1 px-2">
                            <a href="book/` + res.books[i].slug + `" style="text-decoration: none;">
                                <h5 class="card-title text-truncate">` + res.books[i].judul + `</h5>
                            </a>
                            <h6 class="card-subtitle text-muted">` + res.books[i].penulis + `</h6>
                            <p class="card-text text-truncate">` + res.books[i].deskripsi + `</p>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    $('.modal-body').html(htmlView);
}
</script>
@endSection

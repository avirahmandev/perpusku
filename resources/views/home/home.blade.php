@extends('layouts/main_layout')

@section('content')
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
        <div class="circle rounded-circle text-center d-flex"><i class="bi bi-grid"></i><span>Kategori</span></div>
        <div class="circle rounded-circle text-center d-flex"><i class="bi bi-bookmark-heart"></i><span>Favorit</span></div>
        <div class="circle rounded-circle text-center d-flex"><i class="bi bi-journal-bookmark"></i><span>Pinjaman</span></div>
        <div class="circle rounded-circle text-center d-flex"><i class="bi bi-exclamation-circle"></i><span>Panduan</span></div>
        <div class="circle rounded-circle text-center d-flex"><i class="bi bi-search"></i><span>Cari</span></div>
    </div>
</section>
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
                // echo $j;
                if ($j == 6) {
                    break;
                } else {
                    $j++;
                }
                ?>
                    <div class="col mb-2">
                        <div class="card">
                            <img src="assets/img/background_blue.png" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">{{ $buku_rekomendasi->judul }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $buku_rekomendasi->penulis }}</h6>
                                <p class="card-text text-wrap excerp">{{ $buku_rekomendasi->deskripsi }}</p>
                            </div>
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
                // echo $j;
                if ($j == 6) {
                    break;
                } else {
                    $j++;
                }
                ?>
                    <div class="col mb-2">
                        <div class="card">
                            <img src="assets/img/background_blue.png" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">{{ $buku_populer->judul }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $buku_populer->penulis }}</h6>
                                <p class="card-text text-wrap excerp">{{ $buku_populer->deskripsi }}</p>
                            </div>
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
            <div class="row">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="assets/img/background_blue.png" class="img-unggulan img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="card card-unggulan2 col-md-9">
            <div class="row">
                <div class="col-md-4">
                    <img src="assets/img/background_blue.png" class="img-unggulan img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
            </div>
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
            // echo $i;
            if ($i == 6) {
                break;
            } else {
                $i++;
            }
            ?>
            <div class="col mb-2">
                <div class="card">
                    <img src="assets/img/background_blue.png" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-truncate">{{ $book->judul }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $book->penulis }}</h6>
                        <p class="card-text excerp">{{ $book->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endSection

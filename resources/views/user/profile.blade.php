@extends('layouts/user_layout')

@section('userContent')
<header class="container-fluid pt-5">
    <div class="container mt-4">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="assets/img/background_blue.png" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ auth()->user()->nama_lengkap }}</h5>
                        <p class="card-text">Bio pengguna. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Alamat : Jl. Hati-hati di jalan - tulus</li>
                        <li class="list-group-item">No telp : 085-xxxx-xxxx</li>
                        <li class="list-group-item">Jenis Kelamin : Pria</li>
                    </ul>
                </div>
            </div>
            <div class="col-8">
                <div class="list-group">
                    <a href="#edit-profil" class="list-group-item list-group-item-action" data-bs-toggle="offcanvas" data-bs-target="#edit-profil" role="button" aria-controls="edit-profil">Ubah Profil <span class="text-light-emphasis float-end">❯</span></a>
                    <a href="/favorit" class="list-group-item list-group-item-action">Favorit <span class="text-light-emphasis float-end">❯</span></a>
                    <a href="/pinjaman" class="list-group-item list-group-item-action">Buku Pinjaman <span class="text-light-emphasis float-end">❯</span></a>
                    @if(auth()->user()->is_admin)
                    <a href="/dashboard" class="list-group-item list-group-item-action">Dashboard Administrator<span class="text-light-emphasis float-end">❯</span></a>
                    @endif
                </div>
            </div>
            <form action="/logout" method="post">
                @csrf
                <button class="btn btn-danger mx-auto d-block" type="submit">Keluar</button>
            </form>
            {{-- <a href="/logout" class="btn btn-danger text-center" style="max-width: 100px; margin: auto;">Keluar</a> --}}
        </div>
    </div>
    <div class="offcanvas offcanvasbottom container" tabindex="-1" id="edit-profil" aria-labelledby="edit-profil">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Ubah profil</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container">
                <form action="/user/update" method="post" class="form mt-3">
                    {{-- <?= csrf_field(); ?> --}}
                    <label for="nama" class="form-label">Nama Lengkap :</label>
                    <input type="text" name="nama_lengkap" class="form-control" id="nama" autofocus placeholder="nama lengkap" required>
                    <label for="email" class="form-label">Foto :</label>
                    <input type="file" name="foto" class="form-control" id="Foto" placeholder="image.jpg" required>
                    <label for="password" class="form-label">Password :</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
                    <button type="submit" class="btn btn-lg btn-primary text-center px-5 mt-4 d-grid mx-auto">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</header>
@endSection

@extends('layouts/user_layout')

@section('userContent')
<header class="container-fluid pt-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 card p-5 mx-auto">
                <h2>Daftar pengguna baru</h2>
                <form action="/register" method="post" class="form mt-3">
                    @csrf
                    <label for="nama" class="form-label">Nama Lengkap :</label>
                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="nama lengkap" autofocus required>
                    @error('nama_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="hidden" name="slug" id="slug">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" placeholder="example@gmail.com" required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <label for="password" class="form-label">Password :</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password" required>
                   @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <small>Sudah terdaftar? <a href="/login">Masuk</a></small>
                    <button type="submit" class="btn btn-lg btn-primary text-center px-5 mt-4 d-grid mx-auto">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</header>
<script>
const title = document.querySelector('#email');
const slug = document.querySelector('#slug');
title.addEventListener('keyup', function() {
    // get value before '@'
    let filteredMail = title.value.substring(0, title.value.indexOf("@"));
    // replace any characters to empty space
    let filteredText = filteredMail.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
    // replace empty space with dash '-'
    slug.value = filteredText.replace(/\s+/g, "-");
});
</script>
</script>
@endSection

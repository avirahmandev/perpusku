@extends('layouts/user_layout')

@section('userContent')
<header class="container-fluid pt-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 card p-5 mx-auto">
                <h2>Masuk</h2>
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show float-end" role="alert">
                    {{ session('daftarBerhasil') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show float-end" role="alert">
                    {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="/login" method="post" class="form mt-2">
                    @csrf
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" autofocus placeholder="example@gmail.com" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <label for="password" class="form-label">Password :</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
                    <small>Belum terdaftar? <a href="/register">Daftar</a></small>
                    <button type="submit" class="btn btn-lg btn-primary text-center px-5 mt-4 d-grid mx-auto">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</header>
@endSection

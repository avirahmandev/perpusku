@extends('dashboard/layouts/main')

@section('dashboardContent')
<style>
    .card {
        min-height: 150px;
    }
</style>
<div class="container-fluid mx-5">
    <h2 class="mt-4">Ringkasan</h2>
    <div class="row mt-1 g-4">
        <div class="col">
            <div class="card p-4">
                <h1 class="card-title mt-auto">{{ \App\Models\User::count() }}</h1>
                <p class="card-subtitle mb-auto">Jumlah Pengguna</p>
            </div>
        </div>
        <div class="col">
            <div class="card p-4">
        <h1 class="card-title mt-auto">{{ \App\Models\Category::count(); }}</h1>
                <p class="card-subtitle mb-auto">Jumlah Kategori</p>
            </div>
        </div>
        <div class="col">
            <div class="card p-4">
                <h1 class="card-title mt-auto">{{ \App\Models\Book::count(); }}</h1>
                <p class="card-subtitle mb-auto">Jumlah Buku</p>
            </div>
        </div>
    </div>
</div>
@endSection
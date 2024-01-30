@extends('layouts/user_layout')

@section('userContent')
	<div class="container">
		<br><br><br>
		<div class="row col-9 mx-auto">
            <div class="card p-5">
                <h2>Detail Buku</h2>
                <div class="card col-lg-10 mx-auto my-1">
                    <div style="max-height: 380px; overflow: hidden;">
                        <img src="{{ asset('storage/'. $data->cover) }}" class="card-img-top" alt="{{ $data->judul }}">
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted"> {{ $data->penulis }} </h6>
                    <h4 class="card-title text-truncate"> {{ $data->judul }} </h4>
                    <h6>Deskripsi Buku</h6>
                    <p class="card-text">{{ $data->deskripsi }}</p>
                    <hr>
                    <h5>Detail Buku</h5>
                    <div class="row">
                        <div class="col-6">
                            <h6>Kategori</h6>
                            <span>{{ \App\Models\Category::find($data->category_id)->name; }}</span>
                            <br><br>
                            <h6>Tipe</h6>
                            <span>{{ ($data->tipe == false) ? 'E-Book' : 'Cetak' }}</span>
                        </div>
                        <div class="col-6">
                            <h6>Penerbit</h6>
                            <span>{{ $data->penerbit }}</span>
                            <br><br>
                            <h6>Halaman</h6>
                            <span>{{ ($data->halaman != 0) ? $data->halaman : '-' }}</span>
                        </div>
                    </div>

                </div>
                <button class="btn btn-success mx-auto">Download PDF</button>
            </div>
        </div>
        <br>
	</div>
@endSection
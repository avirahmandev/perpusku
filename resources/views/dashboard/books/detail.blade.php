@extends('dashboard/layouts/main')

@section('dashboardContent')
	<div class="container-fluid ms-4">
		<br>
		<div class="row">
            <div class="card p-5 mx-auto">
                <h2>Detail</h2>
                <div class="row">
                <a href="/dashboard/books" class="btn btn-success col-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="/dashboard/books/{{ $slug }}/edit" class="btn btn-warning col-2 ms-2">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
                <form action="/dashboard/books/{{ $slug }}" method="post" class="d-inline col-2">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Pindah data ke Trash?')"><i class="bi bi-x-circle"></i> Delete</button>                            
                </form>
                </div>
                <div class="card col-lg-10 mx-auto my-1">
                    @if($cover)
                        <div style="max-height: 380px; overflow: hidden;">
                            <img src="{{ asset('storage/'. $cover) }}" class="card-img-top" alt="">
                        </div>
                    @else
                        <img src="/assets/img/background_blue.png" class="card-img-top" alt="">
                    @endif
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted"> {{ $penulis }} </h6>
                    <h4 class="card-title text-truncate"> {{ $judul }} </h4>
                    <h6>Deskripsi Buku</h6>
                    <p class="card-text">{{ $deskripsi }}</p>
                    <hr>
                    <h5>Detail Buku</h5>
                    <div class="row">
                        <div class="col-6">
                            <h6>Kategori</h6>
                            <span>{{ \App\Models\Category::find($category_id)->name; }}</span>
                            <br><br>
                            <h6>Tipe</h6>
                            <span>{{ ($tipe == false) ? 'E-Book' : 'Cetak' }}</span>
                        </div>
                        <div class="col-6">
                            <h6>Penerbit</h6>
                            <span>{{ $penerbit }}</span>
                            <br><br>
                            <h6>Halaman</h6>
                            <span>{{ ($halaman != 0) ? $halaman : '-' }}</span>
                        </div>
                    </div>

                </div>
                <button class="btn btn-success mx-auto">Download PDF</button>
            </div>
        </div>
	</div>
@endSection
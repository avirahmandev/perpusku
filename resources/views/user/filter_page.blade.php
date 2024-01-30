@extends('layouts/user_layout')

@section('userContent')
<header class="container-fluid pt-5">
    <div class="mx-5 mt-5">
        <div class="row">
            <div class="col-4 mb-3">
                <div class="card p-4">
                    <h5 class="card-title p-0 m-0">Filter Pencarian</h5>
                    <hr class="my-3">
                    <form action="/books" name="form" method="get">
                        <label for="sortby"><small>Urutkan berdasarkan:</small></label><br>

                        <select class="form-select" name="sortby" onchange="this.form.submit()">
                            <option value="terbaru" {{ request('sortby') === 'terbaru' ? 'selected' : ''}}>Terbaru</option>
                            <option value="populer" {{ request('sortby') === 'populer' ? 'selected' : ''}}>Populer</option>
                            <option value="rekomendasi" {{ request('sortby') === 'rekomendasi' ? 'selected' : ''}}>Rekomendasi</option>
                        </select>
                        <br>
                        <label for="category"><small>Kategori:</small></label><br>
                        <select class="form-select" name="category" onchange="this.form.submit()">
                           	<option value="all" selected>All</option>
                        	@foreach(\App\Models\Category::all() as $item)
                            <option value="{{ $item->slug }}" {{ request('category') === $item->slug ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            <div class="col-8">
                <div class="row">
                    <?php $j=0; ?>
                    @foreach($data as $books_filter)
                    <?php 
		                if ($j == 12) {
		                    break;
		                } else {
		                    $j++;
		                }
		            ?>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <a href="book/{{ $books_filter->slug }}" style="text-decoration: none; color: inherit;">
                                <div style="max-height: 145px; overflow: hidden;">
                                    <img src="{{ asset('storage/'. $books_filter->cover) }}" class="card-img-top" alt="{{ $books_filter->judul }}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-truncate">{{ $books_filter->judul }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $books_filter->penulis }}</h6>
                                    <p class="card-text text-wrap excerp">{{ $books_filter->deskripsi }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @if($data->count() == 0)
                	<p class="text-center fs-4">Buku tidak ditemukan.</p>
                @endif
            {{ $data->links() }}
            </div>
        </div>
    </div>
</header>

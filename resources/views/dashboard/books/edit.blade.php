@extends('dashboard/layouts/main')

@section('dashboardContent')
	<div class="container-fluid ms-4">
		<br>
		<div class="row">
            <div class="card p-5 mx-auto">
                <h2>Perbarui informasi buku</h2>
                <form action="/dashboard/books/{{ $book->slug }}" method="post" class="form mt-2">
                	@method('put')
                    @csrf
                    <div class="row g-3">
                    	<div class="col-7">
		                    <label for="judul" class="form-label">Judul</label>
		                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" autofocus value="{{ old('judul', $book->judul) }}" id="judul" required>
		                    @error('judul')
		                    <div class="invalid-feedback">
		                        {{ $message }}
		                    </div>
		                    @enderror
						</div>
						<div class="col-5">
		            		<label for="slug" class="form-label">Permalink</label>
		            		<input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug', $book->slug) }}" placeholder="terisi otomatis" required>
		                    @error('slug')
		                    <div class="invalid-feedback">
		                        {{ $message }}
		                    </div>
		                    @enderror
						</div>
                    </div>
                    <div class="row mt-3 g-3">	
                    	<div class="col-7">		
		                    <label for="penulis" class="form-label">Penulis</label>
		                    <input type="text" name="penulis" class="form-control" id="penulis" value="{{ old('penulis', $book->penulis) }}" required>
		                    <label for="penerbit" class="form-label">Penerbit</label>
		                    <input type="text" name="penerbit" class="form-control" id="penerbit" value="{{ old('penerbit', $book->penerbit) }}" required>
                    	</div>
                    	<div class="col-5">		
							<label for="halaman" class="form-label">Halaman</label>
		                    <input type="number" name="halaman" class="form-control" id="halaman" value="{{ old('halaman', $book->halaman) }}" min="0" max="5000" required>
							<label for="tipe" class="form-label">Tipe</label>
							<select class="form-select" name="tipe" id="tipe" required>
								<option value="" disabled selected>Pilih...</option>
								<option value="0" {{ old('tipe', $book->tipe) == 0 ? 'selected' : '' }}>E-Book</option>
								<option value="1" {{ old('tipe', $book->tipe) == 1 ? 'selected' : '' }}>Cetak</option>
							</select>
                    	</div>
                    </div>
                    <div class="row mt-3">
                    	<div class="col-12">
                    	<label for="deskripsi" class="form-label">Deskripsi</label>
                    	  <textarea name="deskripsi" class="form-control" id="deskripsi" rows="2" required>{{ old('deskripsi', $book->deskripsi) }}</textarea>
                    	</div>
                    </div>
                    <div class="row mt-3 g-3">
                    	<div class="col-4">
		                    <label for="category" class="form-label">Kategori</label>
		                    <select class="form-select" name="category_id" id="category" required>
								<option value="" disabled selected>Pilih...</option>
		                        	@foreach(\App\Models\Category::all() as $item)
		                        		@if(old('category_id', $book->category_id) == $item->id)
		                        			<option value="{{ $item->id }}" selected>{{ $item->name }}</option>
		                        		@else
		                        			<option value="{{ $item->id }}">{{ $item->name }}</option>
		                        		@endif
		                            @endforeach
		                    </select>
                    	</div>
                    	<div class="col-4">
		                    <label class="form-label">Populer</label><br>
							<input type="radio" class="btn-check" name="populer" value="1" id="populer-ya" {{ (old('populer', $book->populer) == 1) ? 'checked' : '' }} required>
							<label class="btn btn-outline-success" for="populer-ya">Populer</label>
							<input type="radio" class="btn-check" name="populer" value="0" id="populer-tidak" {{ (old('populer', $book->populer) == 0) ? 'checked' : '' }}>
							<label class="btn btn-outline-danger" for="populer-tidak">Tidak</label>
                    	</div>
                    	<div class="col-4">
		                    <label class="form-label">Rekomendasi</label><br>
		                    <input type="radio" class="btn-check" name="rekomendasi" value="1" id="rekomendasi-ya" {{ (old('rekomendasi', $book->rekomendasi) == 1) ? 'checked' : '' }} required>
							<label class="btn btn-outline-success" for="rekomendasi-ya">Rekomendasi</label>
							<input type="radio" class="btn-check" name="rekomendasi" value="0" id="rekomendasi-tidak" {{ (old('rekomendasi', $book->rekomendasi) == 0) ? 'checked' : '' }}>
							<label class="btn btn-outline-danger" for="rekomendasi-tidak">Tidak</label>
                    	</div>	
                    </div>
                    <div class="col mt-3">
                    	<label for="sampul" class="form-label">Sampul Buku</label>
						<input class="form-control" name="sampul" type="file" id="sampul" required>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary text-center px-5 mt-4 d-grid mx-auto">Simpan</button>
                </form>
            </div>
        </div>
	</div>

<script>
	const title = document.querySelector('#judul');
	const slug = document.querySelector('#slug');
	title.addEventListener('keyup', function() {
		slug.value = title.value.replace(/ /g, "-").toLowerCase();
	});
</script>
@endSection
@extends('dashboard/layouts/main')

@section('dashboardContent')
	<div class="container-fluid ms-4">
		<br>
		<div class="row">
            <div class="card p-5 mx-auto">
                <h2>Tambah buku</h2>
                <form action="/dashboard/books" method="post" class="form mt-2" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                    	<div class="col-7">
		                    <label for="judul" class="form-label">Judul</label>
		                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" autofocus value="{{ old('judul') }}" id="judul" required>
		                    @error('judul')
		                    <div class="invalid-feedback">
		                        {{ $message }}
		                    </div>
		                    @enderror
						</div>
						<div class="col-5">
		            		<label for="slug" class="form-label">Permalink</label>
		            		<input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug') }}" placeholder="terisi otomatis" required>
		                    @error('slug')
		                    <div class="invalid-feedback">
		                        {{ $message }}
		                    </div>
		                    @enderror
						</div>
                    </div>
                    <div class="row mt-1 g-3">	
                    	<div class="col-7">		
		                    <label for="penulis" class="form-label">Penulis</label>
		                    <input type="text" name="penulis" class="form-control" id="penulis" value="{{ old('penulis') }}" required>
		                    <label for="penerbit" class="form-label">Penerbit</label>
		                    <input type="text" name="penerbit" class="form-control" id="penerbit" value="{{ old('penerbit') }}" required>
                    	</div>
                    	<div class="col-5">
							<label for="halaman" class="form-label">Halaman</label>
		                    <input type="number" name="halaman" class="form-control" id="halaman" value="{{ (old('halaman')) ? old('halaman') : 0 }}" min="0" max="5000" required>
							<label for="tipe" class="form-label">Tipe</label>
							<select class="form-select" name="tipe" id="tipe" required>
								<option value="" disabled selected>Pilih...</option>
								<option value="0">E-Book</option>
								<option value="1">Cetak</option>
							</select>
                    	</div>
                    </div>
                    <div class="row mt-3">
                    	<div class="col-12">
                    	<label for="deskripsi" class="form-label">Deskripsi</label>
                    	  <textarea name="deskripsi" class="form-control" id="deskripsi" rows="2"  required>{{ old('deskripsi') }}</textarea>
                    	</div>
                    </div>
                    <div class="row mt-3 g-3">
                    	<div class="col-4">
		                    <label for="category" class="form-label">Kategori</label>
		                    <select class="form-select" name="category_id" id="category" required>
								<option value="" disabled selected>Pilih...</option>
		                        	@foreach(\App\Models\Category::all() as $item)
		                        		@if(old('category_id') == $item->id)
		                        			<option value="{{ $item->id }}" selected>{{ $item->name }}</option>
		                        		@else
		                        			<option value="{{ $item->id }}">{{ $item->name }}</option>
		                        		@endif
		                            @endforeach
		                    </select>
                    	</div>
                    	<div class="col-4">
		                    <label class="form-label">Populer</label><br>
							<input type="radio" class="btn-check" name="populer" value="1" id="populer-ya" {{ (old('populer') == 1) ? 'checked' : '' }} required>
							<label class="btn btn-outline-success" for="populer-ya">Populer</label>
							<input type="radio" class="btn-check" name="populer" value="0" id="populer-tidak" {{ (old('populer') == 0) ? 'checked' : '' }}>
							<label class="btn btn-outline-danger" for="populer-tidak">Tidak</label>
                    	</div>
                    	<div class="col-4">
		                    <label class="form-label">Rekomendasi</label><br>
		                    <input type="radio" class="btn-check" name="rekomendasi" value="1" id="rekomendasi-ya" {{ (old('rekomendasi') == 1) ? 'checked' : '' }} required>
							<label class="btn btn-outline-success" for="rekomendasi-ya">Rekomendasi</label>
							<input type="radio" class="btn-check" name="rekomendasi" value="0" id="rekomendasi-tidak" {{ (old('rekomendasi') == 0) ? 'checked' : '' }}>
							<label class="btn btn-outline-danger" for="rekomendasi-tidak">Tidak</label>
                    	</div>	
                    </div>
                    <div class="col mt-3">
                    	<label for="cover" class="form-label">Sampul Buku</label>
                    	<img class="img-preview img-fluid mb-3 col-sm-4">
						<input class="form-control @error('cover') is-invalid @enderror" name="cover" type="file" id="cover" onchange="previewImage()" required>
						@error('cover')
		                    <div class="invalid-feedback">
		                        {{ $message }}
		                    </div>
		                @enderror
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
	let filteredText = title.value.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
	slug.value = filteredText.replace(/\s+/g, "-");
});

function previewImage() {
	const cover = document.querySelector('#cover');
	const imgPreview = document.querySelector('.img-preview');

	imgPreview.style.display = 'block';

	const oFReader = new FileReader();
	oFReader.readAsDataURL(cover.files[0]);

	oFReader.onload = function(oFREvent) {
		imgPreview.src = oFREvent.target.result;
	}
}
</script>
@endSection
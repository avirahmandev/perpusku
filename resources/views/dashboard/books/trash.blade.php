@extends('dashboard/layouts/main')

@section('dashboardContent')
	<div class="container-fluid ms-4">
		<br>
		<div class="row">
			<div class="card p-5 mx-auto">
				<h2>Trash</h2>
		        <div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>PERINGATAN!</strong> buku akan dihapus otomatis setelah 30 hari.
            		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="row">
					@if($data->count() == 0)
						<p class="text-center fs-4">Trash kosong.</p>
					@else
			        <table class="table table-striped table-bordered table-hover text-center mt-2">
			            <thead>
			                <tr class="bg-warning">
			                    <th>No</th>
			                    <th>Judul</th>
			                    <th>Penulis</th>
			                    <th>Dihapus</th>
			                    <th>Aksi</th>
			                </tr>
			            </thead>
			            <tbody>
			                @foreach($data as $book)
			                <tr>
			                    <td>{{ $loop->iteration }}</td>
			                    <td>{{ $book->judul }}</td>
			                    <td>{{ $book->penulis }}</td>
			                    <td>{{ $book->deleted_at->locale('id')->diffForHumans() }}</td>
			                    <td>
			                    	<form action="/dashboard/trash/{{ $book->slug }}/restore" method="post" class="d-inline">
			                    		@csrf
			                    		<button class="badge bg-info border-0 px-5 py-2">Pulihkan</button>
			                    	</form>
			                        <form action="/dashboard/trash/{{ $book->slug }}" method="post" class="d-inline">
			                            @method('delete')
			                            @csrf
			                            <button class="badge bg-danger border-0 px-4 py-2 mt-2" onclick="return confirm('Yakin? buku akan dihapus permanen')">Hapus permanen</button>              
			                        </form>
			                    </td>
			                </tr>
			                @endforeach
			            </tbody>
			        </table>
					@endif 
				</div>
			</div>
		</div>
	</div>
@endSection
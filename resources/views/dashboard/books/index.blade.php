@extends('dashboard/layouts/main')

@section('dashboardContent')
<div class="container-fluid ms-4">
    <br>
    <div class="card p-5 mx-auto">
        <h2>Semua Buku</h2>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <table class="table table-striped table-bordered table-hover text-center mt-2">
            <thead>
                <tr class="bg-warning">
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->penulis }}</td>
                    <td>
                        <a href="/dashboard/books/{{ $book->slug }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                        <a href="/dashboard/books/{{ $book->slug }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                        <form action="/dashboard/books/{{ $book->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Pindah data ke Trash?')"><i class="bi bi-x-circle"></i></button>                            
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endSection
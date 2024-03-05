<div class="list-group rounded-0 col-3 fixed-top">
	<span class="text-light bg-dark px-4" style="padding: 4.5% 0;">
		<h5 class="m-0 p-0">Dashboard</h5>
	</span>
  	<a href="/dashboard" class="list-group-item list-group-item-action border-0 border-bottom {{ Request::is('dashboard') ? 'active' : '' }} py-2 px-4" aria-current="true">
  		<strong><i class="bi bi-files"></i>&nbsp; Ringkasan</strong>
  	</a>
  	<a href="/dashboard/books" class="list-group-item list-group-item-action border-0 border-bottom {{ Request::is('dashboard/books/create') ? '' : (Request::is('dashboard/books*') ? 'active' : '') }} py-2 px-4">
  		<strong><i class="bi bi-journals"></i>&nbsp; Semua Buku</strong>
  	</a>
 	<a href="/dashboard/books/create" class="list-group-item list-group-item-action border-0 border-bottom {{ Request::is('dashboard/books/create') ? 'bg-primary text-light' : '' }} py-2 px-4">
 		<strong><i class="bi bi-journal-plus"></i>&nbsp; Tambah Buku</strong>
 	</a>
 	<a href="/dashboard/trash" class="list-group-item list-group-item-action border-0 border-bottom {{ Request::is('dashboard/trash') ? 'bg-primary text-light' : '' }} py-2 px-4">
 		<strong><i class="bi bi-archive"></i>&nbsp; Trash</strong>
 	</a>
 	<a href="/profile" class="list-group-item list-group-item-action border-0 border-bottom bg-secondary text-light py-2 px-4">
 		<strong><i class="bi bi-arrow-left"></i>&nbsp; Kembali ke Profil</strong>
 	</a>
</div>
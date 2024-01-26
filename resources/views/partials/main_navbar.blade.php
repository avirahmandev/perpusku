<nav class="navbar navbar-expand-sm fixed-top">
    <div class="container-fluid mx-4">
        <a class="navbar-brand text-white" style="font-family: 'montserrat'; font-weight: 800;" href="/">Perpusku</a>
        <ul class="navbar-nav">
            <li class="nav-item mx-2 active">
                <a class="nav-link text-white" href="/about">Tentang</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link text-white" href="/contact">Hubungi</a>
            </li>
            @auth
            <li class="nav-item text-white mx-2">
                <a class="nav-link text-white btn btn-primary" href="/profile">Profil</a>
            </li>
            @else
            <li class="nav-item text-white mx-2">
                <a class="nav-link text-white btn btn-primary" href="/register">Daftar</a>
            </li>
            @endauth
        </ul>
    </div>
</nav>

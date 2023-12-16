<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid mx-4">
        <a class="navbar-brand text-white" style="font-family: 'montserrat'; font-weight: 800;" href="/">Perpusku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
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
    </div>
</nav>

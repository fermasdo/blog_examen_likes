<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <h2><span class="badge badge-secondary">Blog</span></h2>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>

            @auth
                <a class="nav-link" href="{{ route('posts.create') }}">Nuevo post</a>
            @endauth

            <a class="nav-link" href="{{ route('posts.index') }}">Listado de posts</a>

            @auth
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            @endauth

            @guest
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            @endguest


        </div>
    </div>
</nav>

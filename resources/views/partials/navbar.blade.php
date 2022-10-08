<nav class="navbar navbar-expand-lg bg-white shadow">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" href="/home">
                        <span class="align-middle">Home</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Perolehan' ? 'active' : '' }}" href="/votes">
                        <span class="align-middle">Perolehan Suara</span>
                    </a>
                </li>

            </ul>
        </div>
        <form class="d-flex">
            <ul class="navbar-nav me-auto mb-2">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="me-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                        <img class="img-profile rounded-circle" height="50"src="img/male.svg">
                    </a>
                    <ul class="dropdown-menu w-100">
                        <form action="/logout" method="POST">
                            @csrf
                            <a class="dropdown-item" href="/logout?">Log out</a>
                        </form>
                    </ul>
                </li>
            </ul>
        </form>

    </div>
</nav>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand h1" href="{{ route('Home') }}">
            <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top img-circle" alt="Logo">
            Pintu
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <x-nav-item-tamu label="Home" :link="route('Home')" />
                <x-nav-item-tamu label="Kamar" :link="route('kamar')" />
                <x-nav-item-tamu label="Fasilitas" :link="route('fasilitas')" />
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{!empty(auth()->guard('admin')->user()) ? auth()->guard('admin')->user()->nama : ""}}  <i class="ml-2 fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right">
                        @if(empty(auth()->guard('admin')->user()))
                        <a href="{{ route('login') }}" class="dropdown-item">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </a>
                        @else
                        <a href="{{ route('pesan.index') }}" class="dropdown-item">
                        <i class="fas fa-book-open mr-2"></i> Pesan Kamar
                        </a>
                        <a href="{{ route('admin.akun') }}" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2"></i> Akun
                        </a>
                        <form action="{{ route('admin.logout') }}" method="post">
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-in-alt mr-2"></i> Logout
                            </button>
                        </form>
                        @endif
                    </div>

                </li>
            </ul>
        </div>
    </div>
</nav>

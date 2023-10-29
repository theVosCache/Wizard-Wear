<nav class="navbar navbar-expand-md navbar-light bg-none mb-4">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>

            </ul>

            @auth
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown ms-auto">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Dnd
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('dnd.dnd-campaign.index') }}" class="dropdown-item">
                                    Your Campaigns
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            @if (Auth::user()->hasRole('dnd'))
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif
                            @if(Auth::user()->hasRole('admin'))
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a href="{{ route('admin.role.index') }}" class="dropdown-item">
                                        Roles
                                    </a>
                                </li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a href="{{ route('my-account') }}" class="dropdown-item">
                                    My Account
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item link-danger" href="#"
                                   onclick="document.getElementById('logout-form').submit()">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Registeren</a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>

<form action="{{ route('logout') }}" method="post" id="logout-form">
    @csrf
</form>

<nav class="navbar navbar-expand-md navbar-light bg-none mb-4">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('event.index') }}" class="nav-link">Events</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    @role([Role::DM,Role::DND])
                    <li class="nav-item dropdown ms-auto">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Dnd
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('dnd.dnd-campaign.index') }}" class="dropdown-item">
                                    Dnd Campaigns
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole

                    @role([Role::BOARD, Role::ADMIN])
                    <li class="nav-item dropdown ms-auto">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Admin
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('admin.event.index') }}" class="dropdown-item">
                                    Events Beheren
                                </a>
                            </li>
                            <hr>
                            <li>
                                <a href="{{ route('admin.user.index') }}" class="dropdown-item">
                                    Users Beheren
                                </a>
                            </li>
                            @role(Role::ADMIN)
                            <hr>
                            <li>
                                <a href="{{ route('admin.role.index') }}" class="dropdown-item">
                                    Roles
                                </a>
                            </li>
                            @endrole
                        </ul>
                    </li>
                    @endrole

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('my-account.general-info') }}" class="dropdown-item">
                                    My Account
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('my-account.characters') }}" class="dropdown-item">
                                    My Characters
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('my-account.items') }}" class="dropdown-item">
                                    My Items
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
                        <a href="{{ route('login') }}" class="nav-link">Inloggen</a>
                    </li>
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

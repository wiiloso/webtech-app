<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootlab">
    <title>WebTech APP</title>
    <style>
        body {
            opacity: 0;
        }
    </style>
    <link href="{{ asset('/assets/css/modern.css') }}" rel="stylesheet">
    <script src="{{ asset('/assets/js/settings.js') }}"></script>
</head>

<body>
    <div class="splash active">
        <div class="splash-icon"></div>
    </div>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <a class="sidebar-brand" href="{{ route('dashboard') }}">
                <svg>
                    <use xlink:href="#ion-ios-pulse-strong"></use>
                </svg>
                WebTech APP
                {{-- App title --}}
            </a>
            <div class="sidebar-content">
                <div class="sidebar-user">
                    <img src="{{ asset('/img/avatars/user.png') }}" class="img-fluid rounded-circle mb-2"
                        alt="Linda Miller" />
                    <div class="fw-bold">{{ Auth::user()->name }}</div>
                    <small></small>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item active">
                        <a href="{{ route('dashboard') }}">
                            <i class="fas fa-fw fa-home"></i>
                            <span class="aling-middle">{{ __('Home') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle me-2 fas fa-fw fa-home"></i>
                            <span class="align-middle">{{ __('Administration') }}</span>
                        </a>
                        <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            @auth
                                @can('view roles')
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="{{ route('roles.index') }}">Roles</a>
                                    </li>
                                @endcan
                                @can('view permissions')
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="{{ route('permissions.index') }}">Permisos</a>
                                    </li>
                                @endcan
                                @can('view users')
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="{{ route('users.index') }}">Usuarios</a>
                                    </li>
                                @endcan
                            @endauth
                        </ul>
                    </li>
                    <li class="sidebar-item active">
                        <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle me-2 fas fa-fw fa-file"></i> <span
                                class="align-middle">Paginas</span>
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <!-- Agregar show para desplegar el menu -->
                            <li class="sidebar-item"><a class="sidebar-link" href="pages-clients.html">Clientes</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('producto.index') }}">Productos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item active">
                        <a data-bs-target="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle me-2 fas fa-fw fa-sign-in-alt"></i> <span
                                class="align-middle">{{ __('Autorization') }}</span>
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link" href="pages-sign-in.html">Sign
                                    In</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="pages-sign-up.html">Sign
                                    Up</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="pages-reset-password.html">Reset
                                    Password</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="pages-404.html">404
                                    Page</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="pages-500.html">500
                                    Page</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-theme">
                <a class="sidebar-toggle d-flex me-2">
                    <i class="hamburger align-self-center"></i>
                </a>
                <form class="d-none d-sm-inline-block">
                    <input class="form-control form-control-lite" type="text" placeholder="Search projects...">
                </form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        {{-- <li class="nav-item dropdown ms-lg-2">
                            <a class="nav-link dropdown-toggle position-relative" href="#" id="alertsDropdown"
                                data-bs-toggle="dropdown">
                                <i class="align-middle fas fa-bell"></i>
                                <span class="indicator"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                                aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                    4 New Notifications
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="ms-1 text-danger fas fa-fw fa-bell"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Update completed</div>
                                                <div class="text-muted small mt-1">Restart server 12 to complete the
                                                    update.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="ms-1 text-warning fas fa-fw fa-envelope-open"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Lorem ipsum</div>
                                                <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate
                                                    hendrerit et.</div>
                                                <div class="text-muted small mt-1">6h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="ms-1 text-primary fas fa-fw fa-building"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Login from 192.186.1.1</div>
                                                <div class="text-muted small mt-1">8h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="ms-1 text-success fas fa-fw fa-bell-slash"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">New connection</div>
                                                <div class="text-muted small mt-1">Anna accepted your request.</div>
                                                <div class="text-muted small mt-1">12h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all notifications</a>
                                </div>
                            </div>
                        </li> --}}
                        <li class="nav-item dropdown ms-lg-2">
                            <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown"
                                data-bs-toggle="dropdown">
                                <i class="align-middle fas fa-cog"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                        class="align-middle me-1 fas fa-fw fa-user"></i> View Profile</a>
                                {{-- <a class="dropdown-item" href="#"><i
                                        class="align-middle me-1 fas fa-fw fa-comments"></i> Contacts</a>
                                <a class="dropdown-item" href="#"><i
                                        class="align-middle me-1 fas fa-fw fa-chart-pie"></i> Analytics</a>
                                <a class="dropdown-item" href="#"><i
                                        class="align-middle me-1 fas fa-fw fa-cogs"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i
                                        class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out</a> --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                        class="dropdown-item">
                                        <i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right">
                                        </i>{{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-8 text-start">
                        </div>
                        <div class="col-4 text-end">
                            <p class="mb-0">
                                &copy; {{ date('Y') }} - <a href="dashboard-default.html"
                                    class="text-muted">WebTech APP</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <svg width="0" height="0" style="position:absolute">
        <defs>
            <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
                <path
                    d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
                </path>
            </symbol>
        </defs>
    </svg>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
</body>

</html>

<div class="mobile-search">
    <form class="search-form">
        <span data-feather="search"></span>
        <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
    </form>
</div>

<div class="mobile-author-actions"></div>
<header class="header-top" style="background: #1e1f22;">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <a href="" class="sidebar-toggle">
                <img class="svg" src="{{ asset('admin/img/svg/bars.svg') }}" alt="img"></a>
            <a class="navbar-brand" href="{{ url('admin/dashboard') }}"><img class="dark w" src="{{ asset('assets/imgs/logo_blanco_01.png') }}" alt="svg"><img class="light" src="{{ asset('admin/img/logo_white.png') }}" alt="img"></a>
           
            <form action="/" class="search-form">
                <!-- <span data-feather="search"></span>
                <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search..."> -->
            </form>
        </div>
        <!-- ends: navbar-left -->

        <div class="navbar-right">
            <ul class="navbar-right__menu">
                <li class="nav-search d-none">
                    <a href="#" class="search-toggle">
                        <i class="la la-search"></i>
                        <i class="la la-times"></i>
                    </a>
                    <form action="/" class="search-form-topMenu">
                        <span class="search-icon" data-feather="search"></span>
                        <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
                    </form>
                </li>
     
                <!-- ends: .nav-settings -->

                <li class="nav-author">
                    <div class="dropdown-custom" style="background: #2b2d31;">
                        <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('admin/img/author-nav.jpg') }}" alt="" class="rounded-circle"></a>
                        <div class="dropdown-wrapper" style="background: #2b2d31;">
                            <div class="nav-author__info" style="background: #2b2d31; color:#fff;">
                                <div class="author-img" style="background: #2b2d31; color:#fff;">
                                    <img src="{{ asset('admin/img/author-nav.jpg') }}" alt="" class="rounded-circle">
                                </div>
                                <div>
                                    <h6 style="color:#fff;">Administrador</h6>
                                    <span>Rimpsa - Refacciones para maquinaria pesada</span>
                                </div>
                            </div>
                            <div class="nav-author__options">
                                {{-- <ul>
                                    <li>
                                        <a href="">
                                            <span data-feather="user"></span>Perfil</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="settings"></span>Configuracion</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="key"></span> Facturacion</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="users"></span> Actividad</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="bell"></span> Ayuda</a>
                                    </li>
                                </ul> --}}
                                    <a class="nav-author__signout" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();" style="background: #2b2d31; color:#fff;">
                                        <span data-feather="log-out" style="background: #2b2d31; color:#fff;"></span>{{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </div>
                        <!-- ends: .dropdown-wrapper -->
                    </div>
                </li>
                <!-- ends: .nav-author -->
            </ul>
            <!-- ends: .navbar-right__menu -->
            <div class="navbar-right__mobileAction d-md-none">
                <a href="#" class="btn-search">
                    <span data-feather="search"></span>
                    <span data-feather="x"></span></a>
                <a href="#" class="btn-author-action">
                    <span data-feather="more-vertical"></span></a>
            </div>
        </div>
        <!-- ends: .navbar-right -->

    </nav>
</header>

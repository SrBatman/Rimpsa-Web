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
            <a class="navbar-brand" href="#"><img class="dark w" src="{{ asset('admin/img/logo_dark.png') }}" alt="svg"><img class="light" src="{{ asset('admin/img/logo_white.png') }}" alt="img"></a>
           
            <form action="/" class="search-form">
                <span data-feather="search"></span>
                <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
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
                {{-- <li class="nav-settings">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="settings"></span></a>
                        <div class="dropdown-wrapper dropdown-wrapper--large">
                            <ul class="list-settings">
                                <li class="d-flex">
                                    <div class="mr-3"><img src="{{ asset('admin/img/mail.png') }}" alt=""></div>
                                    <div class="flex-grow-1">
                                        <h6>
                                            <a href="" class="stretched-link">Todos los destacados</a>
                                        </h6>
                                        <p>Introducing Increment subscriptions </p>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="mr-3"><img src="{{ asset('admin/img/color-palette.png') }}" alt=""></div>
                                    <div class="flex-grow-1">
                                        <h6>
                                            <a href="" class="stretched-link">Temas</a>
                                        </h6>
                                        <p>Temas third party que son compatibles</p>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="mr-3"><img src="{{ asset('admin/img/home.png') }}" alt=""></div>
                                    <div class="flex-grow-1">
                                        <h6>
                                            <a href="" class="stretched-link">Pagos</a>
                                        </h6>
                                        <p>Manejamos millones de pesos</p>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="mr-3"><img src="{{ asset('admin/img/video-camera.png') }}" alt=""></div>
                                    <div class="flex-grow-1">
                                        <h6>
                                            <a href="" class="stretched-link">Design Mockups</a>
                                        </h6>
                                        <p>Comparta imágenes de planificación con los clientes</p>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="mr-3"><img src="{{ asset('admin/img/document.png') }}" alt=""></div>
                                    <div class="flex-grow-1">
                                        <h6>
                                            <a href="" class="stretched-link">Planeacion de contenido</a>
                                        </h6>
                                        <p>Centralice la recopilación y edición de contenidos</p>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="mr-3"><img src="{{ asset('admin/img/microphone.png') }}" alt=""></div>
                                    <div class="flex-grow-1">
                                        <h6>
                                            <a href="" class="stretched-link">Creador de diagramas</a>
                                        </h6>
                                        <p>Planificar flujos de usuarios y escenarios de prueba</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li> --}}
                <!-- ends: .nav-settings -->

                <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('admin/img/author-nav.jpg') }}" alt="" class="rounded-circle"></a>
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                    <img src="{{ asset('admin/img/author-nav.jpg') }}" alt="" class="rounded-circle">
                                </div>
                                <div>
                                    <h6>Administrador</h6>
                                    <span>Decohogar Muebles</span>
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
                                                        document.getElementById('logout-form').submit();">
                                        <span data-feather="log-out"></span>{{ __('Logout') }}
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

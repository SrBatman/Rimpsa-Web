<aside class="sidebar-wrapper">
            <div class="sidebar sidebar-collapse" id="sidebar" style="background: #2b2d31;">
                <div class="sidebar__menu-group">
                    <ul class="sidebar_nav">
                        <li class="menu-title">
                            <span>Menú principal</span>
                        </li>

                        <li>
                            <a href="{{ url('admin/dashboard') }}" class="{{ Request::is('admin/dashboard') ? 'active':'' }}">
                                <span data-feather="home" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Panel</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/orders') }}" class="{{ Request::is('admin/orders') ? 'active':'' }}">
                                <span data-feather="shopping-bag" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Ordenes</span>
                            </a>
                        </li>

                        <li class="has-child">
                            <a href="#" class="{{ Request::is('admin/categories*') ? 'active':'' }}">
                                <span data-feather="list" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Categorias</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/categories/create') }}">Agregar Categorias</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/categories') }}">Ver Categorias</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-child">
                            <a href="#" class="{{ Request::is('admin/buys*') ? 'active':'' }}">
                                <span data-feather="list" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Compras</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/buys/create') }}">Agregar Compras</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/buys') }}">Ver Compras</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-child">
                            <a href="#" class="{{ Request::is('admin/payments*') ? 'active':'' }}">
                                <span data-feather="list" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Metodo de pago</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/payments/create') }}">Agregar Metodo de pago</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/payments') }}">Ver Metodos de pagos</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-child">
                            <a href="#" class="{{ Request::is('admin/parcels*') ? 'active':'' }}">
                                <span data-feather="list" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Paqueterias</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/parcels/create') }}">Agregar Paqueteria</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/parcels') }}">Ver Paqueterias</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-child">
                            <a href="#" class="{{ Request::is('admin/products*') ? 'active':'' }}">
                                <span data-feather="shopping-bag" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Productos</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/products/create') }}">Agregar Productos</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="{{ url('admin/products') }}">Ver Productos</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ url('admin/brands') }}" class="{{ Request::is('admin/brands') ? 'active':'' }}">
                                <span data-feather="list" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Proveedores</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/branches') }}" class="{{ Request::is('admin/branches') ? 'active':'' }}">
                                <span data-feather="list" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Sucursales</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/colors') }}" class="{{ Request::is('admin/colors') ? 'active':'' }}">
                                <span data-feather="list" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Colores</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/users') }}" class="{{ Request::is('admin/users') ? 'active':'' }}">
                                <span data-feather="users" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Usuarios</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/sliders') }}" class="{{ Request::is('admin/sliders') ? 'active':'' }}">
                                <span data-feather="sliders" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Home Slider</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/settings') }}" class="{{ Request::is('admin/settings') ? 'active':'' }}">
                                <span data-feather="settings" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">
                                    Configuración del sitio</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

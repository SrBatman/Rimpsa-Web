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

                        <li>
                            <a href="{{ url('admin/products') }}" class="{{ Request::is('admin/products*') ? 'active':'' }}">
                                <span data-feather="shopping-cart" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Productos</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/categories') }}" class="{{ Request::is('admin/categories*') ? 'active':'' }}">
                                <span data-feather="tag" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Categorias</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/brands') }}" class="{{ Request::is('admin/brands') ? 'active':'' }}">
                                <span data-feather="bookmark" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Proveedores</span>
                            </a>
                        </li>

                                           
                        <li>
                            <a href="{{ url('admin/logs') }}" class="{{ Request::is('admin/logs') ? 'active':'' }}">
                                <span data-feather="file" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Registros</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/messages') }}" class="{{ Request::is('admin/messages') ? 'active':'' }}">
                                <span data-feather="mail" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Mensajes</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('admin/monitoring') }}" class="{{ Request::is('admin/monitoring') ? 'active':'' }}">
                                <span data-feather="thermometer" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Monitoreo almacén</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/users') }}" class="{{ Request::is('admin/users') ? 'active':'' }}">
                                <span data-feather="users" class="nav-icon"></span>
                                <span class="menu-text" style="color: #fff;">Usuarios</span>
                            </a>
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
                       
                    </ul>
                </div>
            </div>
        </aside>

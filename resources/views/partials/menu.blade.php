<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">ORTSI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('actividad_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} ">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-users"></i>
                            <p>
                                <span>{{ trans('global.actividades.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                          
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.ticket2.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                           
                        </ul>
                    </li>
                @endcan
                @can('inventario_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/equipos*') ? 'menu-open' : '' }} {{ request()->is('admin/softwares*') ? 'menu-open' : '' }} {{ request()->is('admin/perifericos*') ? 'menu-open' : '' }}{{ request()->is('admin/caracteristicas*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-users"></i>
                            <p>
                                <span>{{ trans('global.inventario.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('software_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.softwares.index") }}" class="nav-link {{ request()->is('admin/softwares') || request()->is('admin/softwares/*') ? 'active' : '' }}">
                                        <i class="fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.software.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                             @can('equipo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.equipos.index") }}" class="nav-link {{ request()->is('admin/equipos') || request()->is('admin/equipos/*') ? 'active' : '' }}">
                                        <i class="fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.equipo.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                             @can('periferico_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.perifericos.index") }}" class="nav-link {{ request()->is('admin/perifericos') || request()->is('admin/perifericos/*') ? 'active' : '' }}">
                                        <i class="fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.periferico.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('caracteristica_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.caracteristicas.index") }}" class="nav-link {{ request()->is('admin/caracteristicas') || request()->is('admin/caracteristicas/*') ? 'active' : '' }}">
                                        <i class="fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.componente.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            
                        </ul>
                    </li>
                @endcan
                @can('configuracion_usuario_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-users"></i>
                            <p>
                                <span>{{ trans('global.configuracion-usuario.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('configuracion_general_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/areas*') ? 'menu-open' : '' }} {{ request()->is('admin/edificios*') ? 'menu-open' : '' }} {{ request()->is('admin/dependencias*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-users"></i>
                            <p>
                                <span>{{ trans('global.configuraciones.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('area_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.areas.index") }}" class="nav-link {{ request()->is('admin/areas') || request()->is('admin/areas/*') ? 'active' : '' }}">
                                        <i class="fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.area.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('edificio_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.edificios.index") }}" class="nav-link {{ request()->is('admin/edificios') || request()->is('admin/edificios/*') ? 'active' : '' }}">
                                        <i class="fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.edificio.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('dependencia_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dependencias.index") }}" class="nav-link {{ request()->is('admin/dependencias') || request()->is('admin/dependencias/*') ? 'active' : '' }}">
                                        <i class="fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.dependencia.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('product_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                            <i class="fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('global.products.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                 @can('cliente_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.clientes.index") }}" class="nav-link {{ request()->is('admin/clientes') || request()->is('admin/clientes/*') ? 'active' : '' }}">
                            <i class="fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('global.cliente.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                    <li class="nav-item">
                        <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                            <i class="fas fa-book">

                            </i>
                            <p>
                                <span>{{ trans('global.documento.title') }}</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                            <i class="fas fa-calendar">

                            </i>
                            <p>
                                <span>{{ trans('global.calendario.title') }}</span>
                            </p>
                        </a>
                    </li>
                
      
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
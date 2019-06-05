<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">ORTSI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <p> 
                            <span>Inicio</span>
                        </p>
                    </a>
                </li>

                    <li class="nav-item has-treeview {{ request()->is('admin/ticketsequipos*') ? 'menu-open' : '' }}   {{ request()->is('admin/eventos*') ? 'menu-open' : '' }} {{ request()->is('admin/ticketsadiestramiento*') ? 'menu-open' : '' }}  {{ request()->is('admin/ticketssoftwares*') ? 'menu-open' : '' }}{{ request()->is('admin/ticketsapoyo*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-tags"></i>
                            <p>
                                <span>Actividades</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                          
                                <li class="nav-item">
                                    <a href="{{ route("admin.ticketsequipos.create") }}" class="nav-link d-flex align-items-center {{ request()->is('admin/ticketsequipos') || request()->is('admin/ticketsequipos/*') ? 'active' : '' }}">
                                        <i class="fa fa-tools pr-2">

                                        </i>
                                        <p>
                                            <span>Reparación y <br> mantenimiento</span>
                                        </p>
                                    </a>
                                </li>
                           
                                
                                 <li class="nav-item">
                                    <a href="{{ route("admin.ticketssoftwares.create") }}" class="nav-link d-flex align-items-center {{ request()->is('admin/ticketssoftwares') || request()->is('admin/ticketssoftwares/*') ? 'active' : '' }}">
                                        <i class="fa fa-laptop-code pr-2">

                                        </i>
                                        <p> <span>Instalación y <br>desarrollo de Software</span>
                                           
                                        </p>
                                    </a>
                                </li>
                           
                                <li class="nav-item">
                                    <a href="{{ route("admin.ticketsapoyos.create") }}" class="nav-link {{ request()->is('admin/ticketsapoyos') || request()->is('admin/ticketsapoyos/*') ? 'active' : '' }}">
                                        <i class="fa fa-users-cog pr-2">

                                        </i>
                                        <p>
                                            <span>Apoyo Tecnico</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route("admin.ticketsadiestramientos.create") }}" class="nav-link {{ request()->is('admin/ticketsadiestramientos') || request()->is('admin/ticketsadiestramientos/*') ? 'active' : '' }}">
                                        <i class="fa fa-book-reader pr-2">

                                        </i>
                                        <p>
                                            <span>Adiestramiento</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route("admin.ticketseventos.create") }}" class="nav-link {{ request()->is('admin/ticketseventos') || request()->is('admin/ticketseventos/*') ? 'active' : '' }}">
                                        <i class="fa fa-handshake pr-2">

                                        </i>
                                        <p>
                                            <span>Eventos y Reuniones</span>
                                        </p>
                                    </a>
                                </li>
                            

                            
                        </ul>
                    </li>
               
                   @can('inventario_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/equipos*') ? 'menu-open' : '' }} {{ request()->is('admin/softwares*') ? 'menu-open' : '' }} {{ request()->is('admin/perifericos*') ? 'menu-open' : '' }}{{ request()->is('admin/caracteristicas*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-clipboard-list"></i>
                            <p>
                                <span>Inventario</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('software_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.softwares.index") }}" class="nav-link {{ request()->is('admin/softwares') || request()->is('admin/softwares/*') ? 'active' : '' }}">
                                        <i class="fas fa-code">

                                        </i>
                                        <p>
                                            <span>Software</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                             @can('equipo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.equipos.index") }}" class="nav-link {{ request()->is('admin/equipos') || request()->is('admin/equipos/*') ? 'active' : '' }}">
                                        <i class="fas fa-laptop">

                                        </i>
                                        <p>
                                            <span>Equipos</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                             @can('periferico_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.perifericos.index") }}" class="nav-link {{ request()->is('admin/perifericos') || request()->is('admin/perifericos/*') ? 'active' : '' }}">
                                        <i class="fas fa-microchip">

                                        </i>
                                        <p>
                                            <span>Perifericos</span>
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
                            <i class="fa fa-users-cog"></i>
                            <p>
                                <span>Gestion de usuarios</span>
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
                            <i class="fa fa-users"></i>
                            <p>
                                <span>{{ trans('global.configuraciones.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('tipo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tipos.index") }}" class="nav-link {{ request()->is('admin/tipos') || request()->is('admin/tipos/*') ? 'active' : '' }}">
                                        <i class="fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>Tipos</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('area_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.areas.index") }}" class="nav-link {{ request()->is('admin/areas') || request()->is('admin/areas/*') ? 'active' : '' }}">
                                        <i class="fas fa-cog">

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
                                        <i class="fas fa-building">

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
                                        <i class="fas fa-hotel">

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
                @can('cliente_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.clientes.index") }}" class="nav-link {{ request()->is('admin/clientes') || request()->is('admin/clientes/*') ? 'active' : '' }}">
                            <i class="fa fa-user-tie">

                            </i>
                            <p>
                                <span>{{ trans('global.cliente.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
               
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
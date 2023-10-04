<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Tutoría<strong>TS</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-2 mb-2 text-center">
            {{-- ! GUEST POR MIENTRAS, SOLO DEBE FUNCIONAR CON 'AUTH' --}}
            @guest
                <div class="image">
                    <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="image">
                            <a href="{{ route('perfil') }}">

                                @if (Auth::user()->foto)
                                    <div class="circle-mask shadow">
                                        <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="img-fluid"
                                            alt="User Image">
                                    </div>
                                @else
                                    <div class="circle-mask shadow">
                                        <img src="{{ asset('imgs/user-default.jpg') }}" class="img-fluid" alt="User Image">
                                    </div>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="info">
                            <a href="{{ route('perfil') }}" class="d-block">
                                <p class="mb-0 text-bold">{{ Auth::user()->rol->rol_name }}</p>
                                <p class="mb-0 small">
                                    {{ Auth::user()->apell_p }} {{ Auth::user()->apell }}
                                </p>
                                <p class="mb-0 small">
                                    {{ Auth::user()->name }}
                                </p>
                            </a>
                        </div>
                    </div>
                </div>


            @endguest

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- ? ADMINISTRADOR --}}
                <li class="nav-header">ADMINISTRADOR</li>
                <li class="nav-item">
                    <a href="{{ route('tutores') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Tutores
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('estudiantes') }}" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Estudiantes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Escuestas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Estadísticas
                        </p>
                    </a>
                </li>

                {{-- ? TUTOR --}}
                <li class="nav-header">TUTOR</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Tutorados
                        </p>
                    </a>
                </li>

                {{-- ? ESTUDIANTE --}}
                <li class="nav-header">ESTUDIANTE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Tutor
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('fichapersonal') }}" class="nav-link">
                        <i class="nav-icon far fa-id-card"></i>
                        <p>
                            Ficha Personal
                            <span class="right badge badge-danger">!</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Escuestas
                            <span class="right badge badge-danger">!</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Seguimientos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            Generar constancia
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!DOCTYPE html>
<html lang="es">

<head>
    @livewireStyles

    @include('Layouts.common-head')

    @stack('css')

</head>

<body class="hold-transition sidebar-mini dark-mode">
    <div class="wrapper">

        <!-- Navbar -->
        @include('Layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('Layouts.header')
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    @yield('content')
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        {{-- <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer> --}}
    </div>
    <!-- ./wrapper -->

    <!-- ./MODALES -->
    <!-- ./Modal LogOut -->
    @include('Auth.logout-modal')

    <!-- REQUIRED SCRIPTS -->

    @include('Layouts.common-end')

    {{-- livewire --}}
    @livewireScripts

    @stack('js')

</body>

</html>

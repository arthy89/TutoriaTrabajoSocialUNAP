<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tutoría Trabajo Social</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
    href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
<!-- Notificaciones Lobibox -->
<link rel="stylesheet" href="{{ asset('assets/notify/css/Lobibox.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/notify/css/notifications.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

<style>
    .circle-mask {
        width: 60px;
        /* Ajusta el ancho deseado */
        height: 60px;
        /* Ajusta la altura deseada */
        border-radius: 50%;
        overflow: hidden;
        display: inline-block;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .16), 0 3px 6px rgba(0, 0, 0, .23) !important;
    }

    .circle-mask img {
        object-fit: cover;
        width: 100%;
        height: 100%;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .16), 0 3px 6px rgba(0, 0, 0, .23) !important;
    }

    /* Estilos para el texto en modo oscuro */
    .dark-mode .input-container_1 {
        color: white;
        /* Cambia el color del texto a blanco para modo oscuro */
    }

    /* Estilos para el select2 en modo oscuro */
    .dark-mode .select2-info .select2-selection {
        color: white;
        /* Cambia el color del texto a blanco para modo oscuro */
        background-color: #343a40;
    }

    .dark-mode .select2-info .select2-selection .select2-selection__choice {
        color: white;
        /* Cambia el color de las opciones a blanco para modo oscuro */
    }

    /* Estilos para la parte del select2 que sigue en blanco */
    .dark-mode .select2-info .select2-selection.select2-selection--multiple {
        color: white
            /* Cambia el color del texto a blanco para modo oscuro */
        ;
        background-color: #343a40;
    }

    .dark-mode .select2-info .select2-selection .select2-search .select2-search__field {
        color: white;
    }
</style>

<style>
    /* Estilo para el contenido dentro del th */
    .th-content {
        width: 200px;
        white-space: nowrap;
        /* Evita que el texto se ajuste y se rompa en múltiples líneas */
        overflow: hidden;
        /* Oculta cualquier parte del texto que no quepa */
        text-overflow: ellipsis;
        /* Muestra puntos suspensivos (...) si el texto no cabe */
    }
</style>

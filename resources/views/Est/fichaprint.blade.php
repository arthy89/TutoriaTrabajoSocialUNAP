<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha personal - {{ $est->dni }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .text-justify {
            text-align: justify;
            text-justify: inter-word;
        }

        .tables {
            border-collapse: collapse;
            /* margin-left: auto; */
            /* margin-right: auto; */
        }

        .table-bordered {
            border: 1px solid black;
            vertical-align: middle;
            margin-top: 20px;
        }

        .table-bordered>thead>tr>th {
            border: 1px solid black;
            vertical-align: middle;
        }

        .table-bordered>tbody>tr>td {
            padding: 15px;
            border: 1px solid black;
            vertical-align: middle;
        }

        /* Estilo para tabla con clases similares a table-sm de Bootstrap */
        .table-sm {
            font-size: 0.875em;
            /* Tamaño de fuente más pequeño */
        }

        .table-sm .table-bordered>thead>tr>th,
        .table-sm .table-bordered>tbody>tr>td {
            padding: 0.5rem;
            /* Relleno más pequeño */
        }

        .table-sm .table-bordered {
            margin-top: 10px;
            /* Margen superior más pequeño */
        }
    </style>
</head>

<body>

    <table style="width: 100%">
        <tr>
            <td class="text-center">
                <img src="{{ asset('imgs/Logo_UNAP.png') }}" alt="" style="width: 100px">
            </td>
            <td class="text-center">
                <h3 style="margin-bottom: 0px;">UNIVERSIDAD NACIONAL DEL ALTIPLANO</h3>
                <h4 style="margin-top: 5px; margin-bottom: 0px;">Escuela Profesional de Trabajo Social</h4>
                <p style="margin-top: 5px;">Tutoría</p>
            </td>
            <td>
                <img src="{{ asset('imgs/Trabajo Social.png') }}" alt="" style="width: 100px">
            </td class="text-center">
        </tr>
    </table>

    <br>

    <h1 class="text-center" style="margin-bottom: 10px;">FICHA PERSONAL</h1>

    <div>

        <h3><b>I. Datos Personales</b></h3>

        <table class="tables table-bordered">
            <thead>
                <tr>
                    <th>
                        <b>Código</b>
                    </th>
                    <th>
                        <b>Semestre</b>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $est->dni }}
                    </td>
                    <td>
                        {{ 'semestre' }}
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="tables table-bordered">
            <thead>
                <tr>
                    <th>
                        <b>Apellidos</b>
                    </th>
                    <th>
                        <b>Nombres</b>
                    </th>
                    <th>
                        <b>Sexo</b>
                    </th>
                    <th>
                        <b>Correo</b>
                    </th>
                    <th>
                        <b>Celular</b>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $est->apell }}
                    </td>
                    <td>
                        {{ $est->name }}
                    </td>
                    <td>
                        {{ Str::upper($est->sexo) }}
                    </td>
                    <td>
                        {{ $est->email }}
                    </td>
                    <td>
                        {{ $est->celular }}
                    </td>
                </tr>
            </tbody>
        </table>

        <h3><b>II. Residencia</b></h3>

        <table class="tables table-bordered">
            <thead>
                <tr>
                    <th>
                        <b>Departamento</b>
                    </th>
                    <th>
                        <b>Provincia</b>
                    </th>
                    <th>
                        <b>Distrito</b>
                    </th>
                    <th>
                        <b>Dirección</b>
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                    <td>
                        {{ $est->dni }}
                    </td>
                    <td>
                        {{ 'semestre' }}
                    </td>
                </tr> --}}
            </tbody>
        </table>

        <h3><b>X. Familia</b></h3>

        <table class="tables table-bordered table-sm" style="padding: 5px;">
            <thead>
                <th>
                    <b>Apellidos y Nombres</b>
                </th>
                <th>
                    <b>Familiar</b>
                </th>
                <th>
                    <b>Idioma</b>
                </th>
                <th>
                    <b>Residencia</b>
                </th>
                <th>
                    <b>Dirección</b>
                </th>
                <th>
                    <b>Celular</b>
                </th>
                <th>
                    <b>Estado</b>
                </th>
            </thead>
            <tbody>
                @foreach (json_decode($est->ficha->first()->familia) as $item)
                    <tr>
                        <td style="padding: 0.5rem;">
                            {{ Str::upper($item->nombre) }}
                        </td>
                        <td class="text-center" style="padding: 0.5rem;">
                            @if ($item->parentesco == '1')
                                Padre
                            @elseif($item->parentesco == '2')
                                Madre
                            @elseif($item->parentesco == '3')
                                Abuelo(a)
                            @elseif($item->parentesco == '4')
                                Hermano(a)
                            @elseif($item->parentesco == '5')
                                Cónyuge
                            @elseif($item->parentesco == '6')
                                Hijo(a)
                            @elseif($item->parentesco == '7')
                                Tío(a)
                            @elseif($item->parentesco == '8')
                                Primo(a)
                            @elseif($item->parentesco == '9')
                                Sobrino(a)
                            @endif
                        </td>
                        <td class="text-center" style="padding: 0.5rem;">
                            @if ($item->idioma == '1')
                                Español
                            @elseif($item->idioma == '2')
                                Quechua
                            @elseif($item->idioma == '3')
                                Aymara
                            @endif

                        </td>
                        <td class="align-middle" style="padding: 0.5rem;">
                            {{ Str::upper($item->residencia) }}
                        </td>
                        <td class="align-middle" style="padding: 0.5rem;">
                            {{ Str::upper($item->direccion) }}
                        </td>
                        <td class="text-center align-middle" style="padding: 0.5rem;">
                            {{ $item->celular }}
                        </td>
                        <td class="text-center" style="padding: 0.5rem;">
                            @if ($item->estado == '1')
                                Vivo
                            @else
                                Fallecido
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="padding: 50px; margin-bottom: 10px;">
        <p class="text-right">
            Puno, {{ date('d/m/Y') }}
        </p>
    </div>

    {{-- Imprimir al cargar --}}
    <script>
        // <![CDATA[
        document.body.onload = function() {
            document.body.offsetHeight;
            window.print()
        };
        // ]]>
    </script>
</body>

</html>

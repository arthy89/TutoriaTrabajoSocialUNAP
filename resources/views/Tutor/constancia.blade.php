<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Constancia - {{ $est->dni }}</title>

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
            margin-left: auto;
            margin-right: auto;
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

    <h1 class="text-center" style="margin-bottom: 90px;">CONSTANCIA</h1>

    <div style="padding: 50px">
        <p class="text-justify">
            La (el) Docente de la Escuela Profesional de <b>TRABAJO SOCIAL</b> que suscribe.
        </p>
        <b>HACE CONSTAR:</b>
        <p class="text-justify">
            Que, la (el) estudiante <strong>{{ $est->apell }} {{ $est->name }}</strong>, con código
            <strong>{{ $est->dni }}</strong>; ha recibido X sesiones de tutoría universitaria.
            <br>
            Se expide la presente a solicitud del intesarada(o).
        </p>
    </div>

    <div style="padding: 50px; margin-bottom: 10px;">
        <p class="text-right">
            Puno, {{ date('d/m/Y') }}
        </p>
    </div>

    <div style="padding: 20px; margin-bottom: 20px;">
        <table class="tables table-bordered">
            <tr>
                <td>
                    <strong>
                        @if (Auth::user()->rol->id_rol == 1)
                            Coordinador(a)
                        @else
                            Docente Tutor
                        @endif
                    </strong>
                </td>
                <td>
                    {{ Auth::user()->apell }} {{ Auth::user()->name }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                        Firma
                    </strong>
                </td>
                <td style="padding-top: 100px;" width="300px"></td>
            </tr>
        </table>
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

<div>
    <div class="card card-outline card-success">
        <div class="card-header">
            <h4 class="mb-0"><strong>Lista de Estudiantes</strong></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    @if (is_null($tutor))
                        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#estcrear">
                            <i class="fas fa-user"></i> <i class="fas fa-plus"></i> Agregar nuevo Estudiante
                        </button>
                    @endif
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input wire:model="search" type="text" class="form-control"
                            placeholder="Buscar por nombre o código...">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" class="align-middle" width="50px">
                                    Nº
                                </th>
                                <th scope="col" class="align-middle" width="100px">
                                    Foto
                                </th>
                                <th scope="col" class="align-middle" width="100px">
                                    Código
                                </th>
                                <th class="align-middle" width="500px">
                                    Apellidos y nombres
                                </th>
                                <th class="align-middle" width="100px">
                                    Sexo
                                </th>
                                <th class="align-middle" width="100px">
                                    Ficha
                                </th>
                                @if (Auth::user()->rol->id_rol == 1)
                                    <th scope="col" class="align-middle" width="300px">
                                        <div class="th-content">
                                            Tutor
                                        </div>
                                    </th>
                                @endif
                                <th scope="col" class="align-middle" width="100px">
                                    Seguimientos
                                </th>
                                <th scope="col" class="align-middle" width="100px">
                                    Constancia
                                </th>
                                @if (Auth::user()->rol->id_rol == 1)
                                    <th scope="col" class="align-middle">
                                        Acciones
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if ($estudiantes->isEmpty())
                                <div class="alert alert-info text-center">
                                    <p class="h4 mb-0">No se encontró al Estudiante</p>
                                </div>
                            @endif
                            @foreach ($estudiantes as $est)
                                <tr>
                                    <th class="text-center align-middle">
                                        {{ $est->rowNumber }}
                                    </th>
                                    <td scope="row" class="text-center">
                                        @if ($est->foto)
                                            <div class="circle-mask">
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('storage/' . $est->foto) }}" alt=""
                                                    width="70px" height="70">
                                            </div>
                                        @else
                                            <div class="circle-mask">
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('imgs/user-default.jpg') }}" alt=""
                                                    width="70px" height="70">
                                            </div>
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $est->dni }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $est->apell }} {{ $est->name }}
                                    </td>
                                    <td class="text-center align-middle">
                                        @if ($est->sexo == 'masculino')
                                            <h4><span class="badge bg-primary">M</span></h4>
                                        @elseif ($est->sexo == 'femenino')
                                            <h4><span class="badge bg-danger">F</span></h4>
                                        @else
                                            <h4><span class="badge bg-secondary">N</span></h4>
                                        @endif

                                    </td>
                                    <td class="text-center align-middle">
                                        @if ($est->enFichas)
                                            <a href="{{ route('fichaest', $est->dni) }}"
                                                class="btn btn-outline-success">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        @else
                                            <button class="btn btn-outline-danger">
                                                <i class="fas fa-minus-circle"></i>
                                            </button>
                                        @endif
                                    </td>
                                    @if (Auth::user()->rol->id_rol == 1)
                                        <td class="text-center align-middle">
                                            <select class="form-control"
                                                wire:change="$emit('cambioTutor', {{ $est->id }}, $event.target.value)">
                                                <option value="0" {{ $est->tutor_id == null ? 'selected' : '' }}>
                                                    (Sin tutor)
                                                </option>
                                                @foreach ($tutores as $tutor)
                                                    <option value="{{ $tutor->id }}"
                                                        {{ $est->tutor_id == $tutor->id ? 'selected' : '' }}>
                                                        {{ $tutor->apell }}
                                                        {{ $tutor->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    @endif

                                    <td class="text-center align-middle">
                                        <a href="{{ route('seguimientos', $est->dni) }}" class="btn btn-outline-info">
                                            <strong>{{ $est->seguimientos->count() }}</strong>
                                        </a>
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="{{ route('constancia', $est->dni) }}" class="btn btn-warning"
                                            target="_blank">
                                            <i class="fas fa-file-signature"></i>
                                        </a>
                                    </td>
                                    @if (Auth::user()->rol->id_rol == 1)
                                        <td class="text-center" style="vertical-align: middle;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#esteditar{{ $est->id }}">
                                                    <i class="fas fa-user-edit"></i>
                                                </button>
                                                @if ($est->estado == 0)
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#estestado{{ $est->id }}">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                @elseif ($est->estado == 1)
                                                    <button type="button" class="btn btn-success"
                                                        data-toggle="modal"
                                                        data-target="#estestado{{ $est->id }}">
                                                        <i class="fas fa-check-circle"></i>
                                                    </button>
                                                @endif
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#esteliminar{{ $est->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer clearfix">
            <ul class="pagination justify-content-center mb-0 flex-wrap">
                @if ($estudiantes->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fas fa-chevron-left"></i></span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="#" wire:click="previousPage" rel="prev">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                @endif

                @php
                    $showPages = 6; // Número de páginas a mostrar
                    $half = floor($showPages / 2);
                    $start = max(1, $estudiantes->currentPage() - $half);
                    $end = min($start + $showPages - 1, $estudiantes->lastPage());
                @endphp

                @for ($i = $start; $i <= $end; $i++)
                    <li class="page-item {{ $estudiantes->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="#"
                            wire:click="gotoPage({{ $i }})">{{ $i }}</a>
                    </li>
                @endfor

                @if ($estudiantes->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="#" wire:click="nextPage" rel="next">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fas fa-chevron-right"></i></span>
                    </li>
                @endif
            </ul>
        </div>

    </div>

    {{-- ? Modales Editar/Eliminar --}}
    @foreach ($estudiantes as $est)
        @livewire('admin.estudiantes.esteditar', ['est' => $est], key('editar' . $est->id))
        @livewire('admin.estudiantes.esteliminar', ['est' => $est], key('eliminar' . $est->id))
        @livewire('admin.estudiantes.estestado', ['est' => $est], key('estado' . $est->id))
    @endforeach

    @push('js')
        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('estCreado', function() {
                    Lobibox.notify('success', {
                        width: 400,
                        img: "{{ asset('imgs/success.png') }}",
                        position: 'top right',
                        title: "Estudiante creado",
                        msg: 'El estudiante se registró correctamente'
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('estEliminado', function() {
                    Lobibox.notify('success', {
                        width: 400,
                        img: "{{ asset('imgs/success.png') }}",
                        position: 'top right',
                        title: "Estudiante eliminado",
                        msg: 'El estudiante fue eliminado del sistema'
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('estActualizado', function() {
                    Lobibox.notify('info', {
                        width: 400,
                        img: "{{ asset('imgs/success.png') }}",
                        position: 'top right',
                        title: "Estudiante actualizado",
                        msg: 'El estudiante fue actualizado correctamente'
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('estDeshabilitado', function() {
                    Lobibox.notify('info', {
                        width: 400,
                        img: "{{ asset('imgs/warning.png') }}",
                        position: 'top right',
                        title: "Estudiante deshabilitado",
                        msg: 'El estudiante fue deshabilitado'
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('estHabilitado', function() {
                    Lobibox.notify('success', {
                        width: 400,
                        img: "{{ asset('imgs/success.png') }}",
                        position: 'top right',
                        title: "Estudiante habilitado",
                        msg: 'El estudiante fue habilitado'
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('tutorQuitado', function() {
                    Lobibox.notify('info', {
                        width: 400,
                        img: "{{ asset('imgs/success.png') }}",
                        position: 'top right',
                        title: "Tutor separado",
                        msg: 'Se desvinculó el tutor del estudiante'
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('tutorAgregado', function() {
                    Lobibox.notify('success', {
                        width: 400,
                        img: "{{ asset('imgs/success.png') }}",
                        position: 'top right',
                        title: "Tutor asignado",
                        msg: 'El tutor fue asignado al estudiante'
                    });
                });
            });
        </script>
    @endpush
</div>

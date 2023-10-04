<div>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h4 class="mb-0"><strong>Lista de tutores</strong></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tutorcrear">
                        <i class="fas fa-user-tie"></i> <i class="fas fa-plus"></i> Agregar nuevo Tutor
                    </button>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input wire:model="search" type="text" class="form-control"
                            placeholder="Buscar por nombre...">
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
                                    DNI
                                </th>
                                <th class="align-middle" width="500px">
                                    Apellidos y nombres
                                </th>
                                <th scope="col" class="align-middle">
                                    Tutorados asignados
                                </th>
                                <th scope="col" class="align-middle">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($tutores->isEmpty())
                                <div class="alert alert-info text-center">
                                    <p class="h4 mb-0">No se encontró al Tutor</p>
                                </div>
                            @endif
                            @foreach ($tutores as $tutor)
                                <tr>
                                    <th class="text-center align-middle" style="vertical-align: middle;">
                                        {{ $tutor->rowNumber }}
                                    </th>
                                    <td scope="row" class="text-center align-middle">
                                        @if ($tutor->foto)
                                            <div class="circle-mask">
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('storage/' . $tutor->foto) }}" alt=""
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
                                    <td class="text-center" style="vertical-align: middle;">
                                        {{ $tutor->dni }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {{ $tutor->apell }} {{ $tutor->name }}
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a href="{{ route('tutor', $tutor->dni) }}" class="btn btn-outline-info">
                                            <strong>{{ $tutor->tutoradosAsignados }}</strong>
                                        </a>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#tutoreditar{{ $tutor->id }}">
                                                <i class="fas fa-user-edit"></i>
                                            </button>
                                            @if ($tutor->estado == 0)
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#tutorestado{{ $tutor->id }}">
                                                    <i class="fas fa-lock"></i>
                                                </button>
                                            @elseif ($tutor->estado == 1)
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#tutorestado{{ $tutor->id }}">
                                                    <i class="fas fa-check-circle"></i>
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#tutorliminar{{ $tutor->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer clearfix">
            <ul class="pagination pagination m-0 float-right">
                <!-- Botón "Anterior" -->
                <li class="page-item {{ $tutores->currentPage() == 1 ? 'disabled' : '' }}">
                    <a class="page-link" wire:click="previousPage" aria-label="Anterior">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>

                <!-- Mostrar número 1 -->
                <li class="page-item {{ $tutores->currentPage() == 1 ? 'active' : '' }}">
                    <a class="page-link" wire:click="gotoPage(1)">1</a>
                </li>

                <!-- Mostrar '...' antes de la página actual si no está en las primeras páginas -->
                @if ($tutores->currentPage() > 2)
                    <li class="page-item">
                        <span class="page-link">...</span>
                    </li>
                @endif

                <!-- Mostrar página actual -->
                @if ($tutores->currentPage() > 1 && $tutores->currentPage() < $tutores->lastPage())
                    <li class="page-item active">
                        <a class="page-link"
                            wire:click="gotoPage({{ $tutores->currentPage() }})">{{ $tutores->currentPage() }}</a>
                    </li>
                @endif

                <!-- Mostrar '...' después de la página actual si no está en las últimas páginas -->
                @if ($tutores->currentPage() < $tutores->lastPage() - 1)
                    <li class="page-item">
                        <span class="page-link">...</span>
                    </li>
                @endif

                <!-- Mostrar última página -->
                <li class="page-item {{ $tutores->currentPage() == $tutores->lastPage() ? 'active' : '' }}">
                    <a class="page-link"
                        wire:click="gotoPage({{ $tutores->lastPage() }})">{{ $tutores->lastPage() }}</a>
                </li>

                <!-- Botón "Siguiente" -->
                <li class="page-item {{ $tutores->currentPage() == $tutores->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click="nextPage" aria-label="Siguiente">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>

    </div>

    {{-- ? Modales Editar/Eliminar --}}
    @foreach ($tutores as $tutor)
        @livewire('admin.tutores.tutoreditar', ['tutor' => $tutor], key('editar' . $tutor->id))
        @livewire('admin.tutores.tutoreliminar', ['tutor' => $tutor], key('eliminar' . $tutor->id))
        @livewire('admin.tutores.tutorestado', ['tutor' => $tutor], key('estado' . $tutor->id))
    @endforeach

    @push('js')
        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('tutorCreado', function() {
                    Lobibox.notify('success', {
                        width: 400,
                        img: "{{ asset('imgs/success.png') }}",
                        position: 'top right',
                        title: "Tutor creado",
                        msg: 'El tutor se registró correctamente'
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('tutorEliminado', function() {
                    Lobibox.notify('success', {
                        width: 400,
                        img: "{{ asset('imgs/success.png') }}",
                        position: 'top right',
                        title: "Tutor eliminado",
                        msg: 'El tutor fue eliminado del sistema'
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('tutorActualizado', function() {
                    Lobibox.notify('info', {
                        width: 400,
                        img: "{{ asset('imgs/success.png') }}",
                        position: 'top right',
                        title: "Tutor actualizado",
                        msg: 'El tutor fue actualizado correctamente'
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('tutorDeshabilitado', function() {
                    Lobibox.notify('info', {
                        width: 400,
                        img: "{{ asset('imgs/warning.png') }}",
                        position: 'top right',
                        title: "Tutor deshabilitado",
                        msg: 'El tutor fue deshabilitado'
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('tutorHabilitado', function() {
                    Lobibox.notify('success', {
                        width: 400,
                        img: "{{ asset('imgs/success.png') }}",
                        position: 'top right',
                        title: "Tutor habilitado",
                        msg: 'El tutor fue habilitado'
                    });
                });
            });
        </script>
    @endpush
</div>

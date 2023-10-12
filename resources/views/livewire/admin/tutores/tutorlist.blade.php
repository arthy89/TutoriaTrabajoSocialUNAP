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
                                        <a href="{{ route('tutor', $tutor->dni) }}" class="btn btn-outline-info"
                                            data-toggle="tooltip" data-placement="top" title="Conteo de tutorados">
                                            <strong>{{ $tutor->tutoradosAsignados }}</strong>
                                        </a>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#tutoreditar{{ $tutor->id }}">
                                                <i class="fas fa-user-edit" data-toggle="tooltip" data-placement="top"
                                                    title="Editar"></i>
                                            </button>
                                            @if ($tutor->estado == 0)
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#tutorestado{{ $tutor->id }}">
                                                    <i class="fas fa-lock" data-toggle="tooltip" data-placement="top"
                                                        title="Cambiar estado"></i>
                                                </button>
                                            @elseif ($tutor->estado == 1)
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#tutorestado{{ $tutor->id }}">
                                                    <i class="fas fa-check-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Cambiar estado"></i>
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#tutorliminar{{ $tutor->id }}">
                                                <i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top"
                                                    title="Eliminar"></i>
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
            <ul class="pagination justify-content-center mb-0 flex-wrap">
                @if ($tutores->onFirstPage())
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
                    $start = max(1, $tutores->currentPage() - $half);
                    $end = min($start + $showPages - 1, $tutores->lastPage());
                @endphp

                @for ($i = $start; $i <= $end; $i++)
                    <li class="page-item {{ $tutores->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="#"
                            wire:click="gotoPage({{ $i }})">{{ $i }}</a>
                    </li>
                @endfor

                @if ($tutores->hasMorePages())
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

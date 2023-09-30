<div>
    <div class="card card-outline card-success">
        <div class="card-header">
            <h4><strong>Lista de Estudiantes</strong></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#estcrear">
                        <i class="fas fa-user"></i> <i class="fas fa-plus"></i> Agregar nuevo Estudiante
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
                                    Código
                                </th>
                                <th class="align-middle" width="500px">
                                    Apellidos y nombres
                                </th>
                                <th scope="col" class="align-middle">
                                    Tutorados asignados
                                </th>
                                <th scope="col" class="align-middle">
                                    Estado
                                </th>
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
                                    <th class="text-center" style="vertical-align: middle;">
                                        {{ $est->rowNumber }}
                                    </th>
                                    <td scope="row" class="text-center">
                                        <img class="img-circle img-bordered-sm"
                                            src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=2080&amp;q=80"
                                            alt="" width="70px" height="70">
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        {{ $est->dni }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {{ $est->apell }} {{ $est->name }}
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a href="#" class="btn btn-outline-primary">
                                            <strong>20</strong>
                                        </a>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if ($est->estado == 0)
                                            <button type="button" class="btn btn-danger">
                                                <strong><i class="fas fa-lock"></i> Deshabilitado</strong>
                                            </button>
                                        @elseif ($est->estado == 1)
                                            <button type="button" class="btn btn-success">
                                                <strong><i class="fas fa-check-circle"></i> Habilitado</strong>
                                            </button>
                                        @endif

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
                <li class="page-item {{ $estudiantes->currentPage() == 1 ? 'disabled' : '' }}">
                    <a class="page-link" wire:click="previousPage" aria-label="Anterior">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>

                <!-- Mostrar número 1 -->
                <li class="page-item {{ $estudiantes->currentPage() == 1 ? 'active' : '' }}">
                    <a class="page-link" wire:click="gotoPage(1)">1</a>
                </li>

                <!-- Mostrar '...' antes de la página actual si no está en las primeras páginas -->
                @if ($estudiantes->currentPage() > 2)
                    <li class="page-item">
                        <span class="page-link">...</span>
                    </li>
                @endif

                <!-- Mostrar página actual -->
                @if ($estudiantes->currentPage() > 1 && $estudiantes->currentPage() < $estudiantes->lastPage())
                    <li class="page-item active">
                        <a class="page-link"
                            wire:click="gotoPage({{ $estudiantes->currentPage() }})">{{ $estudiantes->currentPage() }}</a>
                    </li>
                @endif

                <!-- Mostrar '...' después de la página actual si no está en las últimas páginas -->
                @if ($estudiantes->currentPage() < $estudiantes->lastPage() - 1)
                    <li class="page-item">
                        <span class="page-link">...</span>
                    </li>
                @endif

                <!-- Mostrar última página -->
                <li class="page-item {{ $estudiantes->currentPage() == $estudiantes->lastPage() ? 'active' : '' }}">
                    <a class="page-link"
                        wire:click="gotoPage({{ $estudiantes->lastPage() }})">{{ $estudiantes->lastPage() }}</a>
                </li>

                <!-- Botón "Siguiente" -->
                <li class="page-item {{ $estudiantes->currentPage() == $estudiantes->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" wire:click="nextPage" aria-label="Siguiente">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

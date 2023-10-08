<div>
    <div class="row">
        <div class="col-12 col-md-6 mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#seguimientoCrear">
                <i class="fas fa-plus-circle"></i> Nuevo seguimiento
            </button>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input wire:model="buscar" type="text" class="form-control"
                    placeholder="Buscar por título o fecha (día | mes | años)...">
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($seguimientos as $seguimiento)
            <div class="col-12 col-md-4">
                <div class="card card-outline card-primary">
                    <div class="card-header py-1 px-2">
                        <table class="table table-sm borderless mb-0 mt-0">
                            <thead>
                                <tr>
                                    <td class="align-middle" width="30px">
                                        <h4 class="mb-0 mt-0">
                                            <span class="badge bg-info dark-mode">
                                                {{ $seguimiento->num_seg }}
                                            </span>
                                        </h4>
                                    </td>
                                    <td class="align-middle text-left">
                                        <b>
                                            {{ $seguimiento->titulo }}
                                        </b>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="card-footer p-0 table-responsive px-3">
                        <table class="table table-sm borderless mb-0 mt-1">
                            <thead>
                                <tr>
                                    <td>
                                        Fecha creada:
                                        <strong>{{ date('d/m/Y', strtotime($seguimiento->created_at)) }}</strong>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" data-toggle="modal"
                                                data-target="#segVer{{ $seguimiento->id_seg }}">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <button type="button" class="btn btn-default" data-toggle="modal"
                                                data-target="#segEditar{{ $seguimiento->id_seg }}">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- ? Modales Ver/Editar --}}
        @foreach ($seguimientos as $seguimiento)
            @livewire('tutor.seguimientover', ['seguimiento' => $seguimiento], key('ver' . $seguimiento->id_seg))
            @livewire('tutor.seguimienteditar', ['seguimiento' => $seguimiento], key('editar' . $seguimiento->id_seg))
        @endforeach
    </div>

    {{-- Paginado --}}
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-center">
            <ul class="pagination mb-0 flex-wrap">

                @if ($seguimientos->onFirstPage())
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
                    $start = max(1, $seguimientos->currentPage() - $half);
                    $end = min($start + $showPages - 1, $seguimientos->lastPage());
                @endphp

                @for ($i = $start; $i <= $end; $i++)
                    <li class="page-item {{ $seguimientos->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="#"
                            wire:click="gotoPage({{ $i }})">{{ $i }}</a>
                    </li>
                @endfor

                @if ($seguimientos->hasMorePages())
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
</div>
